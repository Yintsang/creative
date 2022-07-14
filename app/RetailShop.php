<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RetailShop extends BaseModel
{
    protected $table = 'retail_shop';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function supplier(){
        return $this->belongsToMany(\App\Collection::class, 'retail_shop_supplier_relation', 'retail_shop_supplier_id', 'retail_shop_id');
    }
}
