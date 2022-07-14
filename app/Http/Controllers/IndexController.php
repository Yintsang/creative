<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        return parent::output(function($data){
            $data['home_page'] = \App\HomePage::withDescription()->first();
            $data['seo'] = $this->getSeo($data['home_page']);
            $data['popup'] =  \App\Popup::withDescription()->online()->online()->arrange()->first();
            $data['banner'] =  \App\HomeBanner::withDescription()->online()->arrange()->get();
            $data['content'] =  \App\HomePage::withDescription()->online()->arrange()->get();
            $data['content_sub_section'] = \App\HomePage::withDescription()->online()->firstOrFail();
            $data['content_sub_section']->initRepeater();
            $data['client'] =  \App\Client::withDescription()->online()->firstOrFail();
            $data['client']->getMedia('image_list', true);
            // dd($data['client']);
            return view('frontend.index', $data);
        });
    }
}
