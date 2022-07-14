<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        return parent::output(function($data){
            $data['contact_us_page'] = \App\ContactUs::withDescription()->first();
            $data['seo'] = $this->getSeo($data['contact_us_page']);
            $data['contact_us_page'] =  \App\ContactUs::withDescription()->online()->firstOrFail();
            // dd($data['about_us_history']->content);
            return view('frontend.contact_us', $data);
        });
    }
}
