<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Business extends BaseModel
{
    protected $table = 'business';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function business_collection(){
        return $this->belongsToMany(\App\Collection::class, 'business_collection_relation', 'business_collection_id', 'business_id');
    }
    public function product(){
        return $this->belongsToMany(\App\Product::class, 'product_business_relation', 'business_id', 'product_business_id');
    }
}
