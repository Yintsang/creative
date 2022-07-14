<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends BaseModel
{
    protected $table = 'supplier';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function shop(){
        return $this->belongsToMany(\App\Collection::class, 'shop_supplier_relation', 'shop_id', 'shop_supplier_id');
    }
    public function retail_shop(){
        return $this->belongsToMany(\App\Collection::class, 'retail_shop_supplier_relation', 'retail_shop_id', 'retail_shop_supplier_id');
    }

}
