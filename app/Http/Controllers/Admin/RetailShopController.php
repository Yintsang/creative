<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class RetailShopController extends BaseAdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listing()
    {
        parent::listing();
        $data['config'] = $this->getConfig();
        $data['records'] = $this->getPosts();
        return view($this->section('listing'), $data);
    }
    
    public function detail($id = '')
    {
        parent::detail($id);
        $data['record'] = $this->getPost($id);
        $data['config'] = $this->getConfig();
        $data['languages'] = $this->getLanguages();
        $data['medias'] = $data['record']->getMedias();
        $data['id'] = $id;
        $data['record']->initRepeater(true);
        $data['supplier'] = \App\Supplier::withDescription()->arrange()->get();
        $data['districts'] = \App\PosLocation::withDescription()->withModel(['parent', 'parent.parent'])->arrange()->get();
        $data['countries'] = \App\PosLocationCategory::withDescription(1)->where('parent_id', 0)->arrange()->get();
        foreach($data['districts'] as $item){
            $item->search_title = '';
            if(isset($item->parent->parent) && $item->parent->parent){
                $item->search_title .= $item->parent->parent->title . ' - ';
            }
            
            if($item->parent){
                $item->search_title .= $item->parent->title . ' - ';
            }

            $item->search_title .= $item->title;
        }
        
        // $location = $data['record']->location;
        // $locations = \App\PosLocationCategory::withDescription(1)->where('parent_id', 0)->arrange()->get();
        // $region_array = [];
        // foreach ($locations as $locations_item) {
        //     $locations_id = $locations_item->id;
        //     $region_array[$locations_id] = locationHasChild($locations_id) ? \App\PosLocationCategory::withDescription(1)->where('parent_id', $locations_id)->arrange()->get() : \App\PosLocation::withDescription(1)->where('parent_id', $locations_id)->arrange()->get();
        // }
        // $data['regions'] = $region_array;
        // $districts = \App\PosLocation::withDescription(1)->arrange()->get();
        // $district_array = [];

        // foreach ($districts as $district) {
        //     if (array_key_exists($district->parent_id, $district_array)) {
        //         $district_array[$district->parent_id]->push($district);
        //     } else {
        //         $district_array[$district->parent_id] = collect([$district]);
        //     }
        // }

        // $data['districts'] = $district_array;
        return view($this->section('detail'), $data);
    }

    public function arrangement($id = '')
    {
        $data['config'] = $this->getConfig();
        $data['records'] = $this->getAllPosts();
        return view($this->section('arrangement'), $data);
    }

    public function postsQuery($route_params, $query){
        return $query;
    }

    public function beforeSave(Request $request, $customData = []){
        return $customData;
    }

    public function afterSave(Request $request, $customData = [], $model){
        $model->supplier()->sync(request('supplier'));
    }

    public function afterDelete(Request $request, $model){
        $model->supplier()->detach();
    }
    
}
