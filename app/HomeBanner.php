<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeBanner extends BaseModel
{
    protected $table = 'home_banner';

    public $casts = ['rows' => 'array'];

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
}
