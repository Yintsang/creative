<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PosLocation extends BaseChildModel
{
    protected $table = 'pos_location';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function retail_shops(){
        return $this->hasMany(\App\RetailShop::class, 'district_id');
    }
}
