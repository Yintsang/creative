<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CmsDemo extends BaseModel
{
    protected $table = 'cms_demo';

    protected $casts = ['logos' => 'array'];

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }

    public function tags(){
        return $this->belongsToMany(\App\CmsDemoTag::class, 'cms_demo_tag_relation', 'cms_demo_id', 'cms_demo_tag_id');
    }

}
