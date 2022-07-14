<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        return parent::output(function($data){
            $data['client_page'] = \App\Client::withDescription()->first();
            $data['seo'] = $this->getSeo($data['client_page']);
            $data['client'] =  \App\Client::withDescription()->online()->firstOrFail();
            $data['client']->getMedia('image_list', true);
            // dd($data['about_us_history']->content);
            return view('frontend.client', $data);
        });
    }
}
