<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends BaseModel
{
    protected $table = 'product';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function supplier(){
        return $this->belongsTo(\App\Supplier::class, 'supplier_id', 'id');
    }
    public function series(){
        return $this->belongsTo(\App\Supplier::class, 'series_id', 'id');
    }
    public function collection(){
        return $this->belongsToMany(\App\Collection::class, 'product_collection_relation', 'product_collection_id', 'collection_id');
    }
    public function business(){
        return $this->belongsToMany(\App\Business::class, 'product_business_relation', 'product_business_id', 'business_id');
    }
}
