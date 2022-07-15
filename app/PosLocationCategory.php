<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PosLocationCategory extends BaseCategoryModel
{
    protected $table = 'pos_location_category';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function region(){
        return $this->hasMany(\App\PosLocationCategory::class, 'id');
    }
}
