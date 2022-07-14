<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class PostMedia extends BaseModel
{
    protected $table = 'post_media';

    public function __construct()
    {
        parent::__construct();
    }

    public function medias(){
        return $this->hasMany('App\Media', 'id', 'media_id');
    }

}