<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OnlineShop extends BaseModel
{
    protected $table = 'online_shop';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function supplier(){
        return $this->belongsToMany(\App\Collection::class, 'shop_supplier_relation', 'shop_supplier_id', 'shop_id');
    }
}
