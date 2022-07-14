<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends BaseModel
{
    protected $table = 'event';

    public function getListingUrl($params = []){
        return false;
    }

    public function getDetailUrl($params = []){
        return false;
    }
    public function tag(){
        return $this->belongsTo(\App\EventTag::class, 'tag_id', 'id');
    }
}
