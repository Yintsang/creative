<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        return parent::output(function($data){
            $data['about_us_page'] = \App\AboutUsPage::withDescription()->first();
            $data['seo'] = $this->getSeo($data['about_us_page']);
            $data['about_us'] =  \App\AboutUsPage::withDescription()->online()->firstOrFail();
            $data['about_us_history'] =  \App\AboutUsHistory::withDescription()->online()->firstOrFail();
            $data['about_us_history']->initRepeater();
            $data['about_us_mission'] =  \App\AboutUsMission::withDescription()->online()->firstOrFail();
            $data['about_us_business'] =  \App\AboutUsBusiness::withDescription()->online()->firstOrFail();
            // dd($data['about_us_history']->content);
            return view('frontend.about_us', $data);
        });
    }
}
