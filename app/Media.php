<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\MediaFolder;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use ImageOptimizer;
class Media extends BaseModel
{
    protected $table = 'media';
    protected $resizedBaseFolder = 'resized';
    protected static $storage_base_path = 'app/public';
    public $thumbnail_width = 140;
    protected $appends = ['thumbnail', 'path', 'folder_path'];

    public function getPathAttribute()
    {
        return Storage::url($this->getPath());
    }

    public function getFolderPathAttribute(){
        $folder_path = '';

        if($this->parent){
            $folder_path = $this->parent->getPath();
        }

        return $folder_path;
    }

    public function getThumbnailAttribute()
    {
        if($this->isImage()){
            return $this->getResizedImage();
        }else if(preg_match("/(svg|webp)/", $this->mime_type)){
            return Storage::url($this->getPath());
        }

        return null;
    }

    public function getPath(){
        return $this->folder_path . '/' . $this->file_name;
    }

    public function parent()
    {
        return $this->hasOne('App\MediaFolder', 'id', 'folder_id');
    }

    public function post_medias()
    {
        return $this->hasMany('App\PostMedia', 'media_id', 'id');
    }

    public function isImage()
    {
        return preg_match("/(jpg|jpeg|png|gif)/", $this->mime_type);
    }

    public function getResizedImage($width = null, $height = null, $force_resize = false, $fill_bg = false, $anchor = 'center', $convert_to_png = false)
    {
        if(!$this->isImage()){
            return $this->path;
        }

        if(!$width && !$height){
            $width = $this->thumbnail_width;
        }

        $resizedFolderPath = $this->resizedBaseFolder . '/' . $this->id . '/' . $width . 'x' . $height . ($fill_bg ? 'bg' : '') . ($anchor != 'center' ? $anchor : '');
        $resizedPath = $resizedFolderPath . '/' . $this->file_name;
        
        if($width && $height && $fill_bg && $convert_to_png){
            $resizedPath = preg_replace("/\.(jpg|jpeg|gif)$/", ".png", $resizedPath);
        }

        $need_resize = false;

        if(!Storage::exists($resizedPath)){
            if(config('filesystems.default') == 'public'){
                $need_resize = str_replace("www.", '', config('app.url')) == str_replace("www.", '', url(''));
            }else if(in_array(config('filesystems.default'), ['ftp', 'sftp'])){
                $need_resize = true;
            }
        }

        if($need_resize){
            Storage::makeDirectory($resizedFolderPath);
            $media_path = $this->getPath();
            $file = Storage::exists($media_path) ? Storage::get($media_path) : null;

            if($file){
                $img = Image::make($file);

                if(!$force_resize){
                    if(($img->width() < $width && $height === null) || ($img->height() < $height && $width === null)){
                        Storage::put($resizedPath, $img->stream()->__toString());
                        return Storage::url($resizedPath);
                    }
                }

                if($width && $height){
                    if(!$fill_bg){
                        $img->fit($width, $height);
                    }else{
                        if(!preg_match("/png/", $img->mime()) && $convert_to_png){
                            $img = $img->encode('png');
                        }
                        $img->resize($width, $height, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $img->resizeCanvas($width, $height, $anchor);
                    }
                }else{
                    $img->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                Storage::put($resizedPath, $img->stream()->__toString());
            }
        }

        return Storage::url($resizedPath);
    }

    public static function saveMedia($data, $file){
        $media = new Media;
        $media->folder_id = isset($data['folder_id']) ? $data['folder_id'] : 0;
        $orgin_folder_id = $media->folder_id;
        $media->extension = $file->getClientOriginalExtension();
        $media->title = preg_replace("/\." . $media->extension . "$/", '', $file->getClientOriginalName());
        $media->file_name = $file->getClientOriginalName();
        $media->disk = config('filesystems.default');
        $media->size = $file->getSize();
        $media->mime_type = $file->getMimeType();

        $file_full_path = isset($data['fullPath']) ? $data['fullPath'] : $media->file_name;
        $file_regex = preg_quote($media->file_name, '/');
        $folder_path =  preg_replace("/\/?" . $file_regex . "$/", '', $file_full_path);

        $mediaFolder = MediaFolder::createRecursive($media->folder_id, $folder_path);
        $media->folder_id = $mediaFolder->id;
        $media->renameIfNeed();

        $file_contents = file_get_contents($file);

        if(Storage::put($mediaFolder->getPath() . '/' . $media->file_name, $file_contents)){

            $media->imageProcess($file_contents);
            $media->save();
            $media->post_medias = [];
            $media->path = Storage::url($media->getPath());
            $media->folder_path = $media->parent->getPath();

            return [
                'orgin_folder_id' => $orgin_folder_id,
                'media' => $media,
            ];
        }

        return false;
    }

    public function imageProcess($file_contents){

        if(!$this->isImage()){
            return;
        }

        $media_path = $this->getPath();
        $image = Image::make($file_contents);

        // resize image size if enabled max size
        $systemSetting = SystemSetting::first()->details;

        if(isset($systemSetting['enable_max_img_size']) && $systemSetting['enable_max_img_size']){

            $image_width = $image->width();
            $image_height = $image->height();

            if($image_width > $systemSetting['img_max_width'] || $image_height > $systemSetting['img_max_height']){

                if($image_width > $systemSetting['img_max_width']){
                    $image->resize($systemSetting['img_max_width'], null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                $image_height = $image->height();

                if($image_height > $systemSetting['img_max_height']){
                    $image->resize(null, $systemSetting['img_max_height'], function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                Storage::put($media_path, $image->stream()->__toString());
            }

        }
        
        // add watermark if need
        if(config('appcustom.watermark') && isset($data['watermark']) && $data['watermark'] === 'true'){
            $watermark = Image::make(storage_path(Media::$storage_base_path . '/' . config('appcustom.watermark_path')));
            $watermark_offset = (int)($image->height() * 0.23);
            $watermark_width = (int)($image->width() * 0.3);

            $watermark->resize($watermark_width, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->insert($watermark, 'bottom', 0, $watermark_offset);
            Storage::put($media_path, $image->stream()->__toString());
        }

        // set jpg quality
        if(isset($systemSetting['jpg_quality']) && $systemSetting['jpg_quality']){
            config(['image-optimizer.optimizers.' . \Spatie\ImageOptimizer\Optimizers\Jpegoptim::class . '.0' => '-m' . $systemSetting['jpg_quality']]);
        }
        
        $this->optimizeImage($image, $media_path);

        clearstatcache();
        $this->size = Storage::size($media_path);
        $this->width = $image->width();
        $this->height = $image->height();

        return $image;
 
    }

    public function delete()
    {
        Storage::delete($this->getPath());
        $this->deleteResizedFolder();
        parent::delete();
        $this->post_medias()->delete();
        return true;
    }

    public static function deleteBy($id)
    {
        $media = Media::find($id);
        if($media){
            return $media->delete();
        }
        return false;
    }

    public function deleteResizedFolder(){
        $folder_path = $this->resizedBaseFolder . '/' . $this->id;

        if(Storage::exists($folder_path)){
            Storage::deleteDirectory($folder_path);
        }
    }

    public function optimizeImage($image, $media_path = null){
        if(!$media_path){
            $media_path = $this->getPath();
        }
        
        if(config('filesystems.default') == 'public'){
            ImageOptimizer::optimize(storage_path_v2($media_path));
        }else if(config('filesystems.default') == 'ftp'){
            $temp_path = 'temp/' . $this->file_name;
            Storage::disk('local')->put($temp_path, $image->stream()->__toString());
            ImageOptimizer::optimize(storage_path_v2($temp_path, 'local'));
            Storage::put($media_path, Storage::disk('local')->get($temp_path));
            Storage::disk('local')->delete($temp_path);
        }
    }

    public function move($folder_id)
    {
        if($this->folder_id == $folder_id){
            return false;
        }
        $old_path = $this->getPath();
        $this->folder_id = $folder_id;
        $this->renameIfNeed();
        $this->save();
        $newMedia = Media::find($this->id);
        $new_path = $newMedia->getPath();
        Storage::move($old_path, $new_path);
        return $this;
    }

    public static function moveBy($id, $folder_id)
    {
        $media = Media::find($id);
        if($media){
            return $media->move($folder_id);
        }
        return false;
    }

    public function renameIfNeed($folder_id = false){
        if(!$folder_id){
            $folder_id = $this->folder_id;
        }
        $i = 1;
        while (Media::where(['folder_id' => $folder_id, 'file_name' => $this->file_name])->first()){
            $this->file_name = sprintf("%s-%d.%s", $this->title, ++ $i, $this->extension);
        }
    }

    public static function editBy($id, $data){
        $media = Media::find($id);
        if($media){
            return $media->edit($data);
        }
        return false;
    }

    public function edit($data){
        
        \DB::beginTransaction();

        if($file = request()->file('file')){
            $old_path = $this->getPath();

            $this->title = preg_replace("/\." . $this->extension . "$/", '', $file->getClientOriginalName());
            $this->extension = $file->getClientOriginalExtension();
            $this->file_name = $file->getClientOriginalName();
            $this->size = $file->getSize();
            $this->mime_type = $file->getMimeType();
            $this->renameIfNeed();

            $file_contents = file_get_contents($file);
            Storage::put($this->getPath(), $file_contents);

            $this->imageProcess($file_contents);

            if(Storage::exists($old_path)){
                Storage::delete($old_path);
            }

            $this->deleteResizedFolder();
            $this->getResizedImage();

        }else{

            $media_path = $this->getPath();

            if(isset($data['image'])){
                $this->deleteResizedFolder();
                $img = Image::make($data['image']);
                Storage::put($media_path, $img->stream()->__toString());
                $this->getResizedImage();
                $this->size = Storage::size($media_path);
                $this->width = $img->width();
                $this->height = $img->height();
            }

            if(isset($data['file_name']) && $data['file_name'] != $this->file_name){
                $new_path = $this->parent->getPath() . '/' . $data['file_name'];
                if(!Storage::exists($new_path)){
                    Storage::rename($media_path, $new_path);
                    $this->file_name = $data['file_name'];              
                }
            }

            $this->title = $data['title'];

        }

        $this->save();

        $this->load('post_medias');

        \DB::commit();

        return $this;
    }
}
