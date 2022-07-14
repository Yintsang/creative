<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index($cate = '')
    {
        return parent::output(function($data) use($cate){
            $data['event_page'] = \App\Event::withDescription()->first();
            $data['seo'] = $this->getSeo($data['event_page']);
            $query = \App\Event::withDescription()->online()->orderBy('post_date','desc');
            $data['cate'] = '';
            $t = date('Y-m-d');
            if($cate == 'current'){
                $query->where(function ($query) use ($t) {
                    $query->where('from_date', '<=', $t);
                    $query->where('to_date', '>=', $t);
                });
            }
            if($cate == 'upcoming'){
                $query->where(function ($query) use ($t) {
                    $query->where('from_date', '>', $t);
                    // $query->where('to_date', '>', $t);
                });
            }
            if($cate == 'recap'){
                $query->where(function ($query) use ($t) {
                    $query->where('from_date', '<', $t);
                    $query->where('to_date', '<', $t);
                });
            }
            $data['cate'] = $cate;
            $data['event'] = \App\Event::withDescription()->online()->orderBy('post_date','desc')->get();
            $data['event'] = $query->get();
            // dd($data['event']);
            return view('frontend.event', $data);
        });
    }
}
