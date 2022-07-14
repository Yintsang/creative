<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Collection extends BaseModel
{
    protected $table = 'collection';

    protected $casts = ['content' => 'array','content2' => 'array','content3' => 'array','content4' => 'array'];

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function business(){
        return $this->belongsToMany(\App\Business::class, 'business_collection_relation', 'business_id', 'business_collection_id');
    }
}
