<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnersController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        return parent::output(function($data){
            $data['partners_page'] = \App\Partners::withDescription()->first();
            $data['seo'] = $this->getSeo($data['partners_page']);
            $data['partners'] =  \App\Partners::withDescription()->online()->firstOrFail();
            $data['partners']->initRepeater();
            // dd($data['about_us_history']->content);
            return view('frontend.partners', $data);
        });
    }
}
