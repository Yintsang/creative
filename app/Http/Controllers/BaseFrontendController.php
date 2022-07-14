<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseFrontendController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function output($callback){

        $data['current_language'] =  \App\Language::getCurrentLanguage();
        $data['all_languages'] = \App\Language::getAllLanguageRoutes();
        $data['other_languages'] = $data['all_languages']->reject(function($language) {
            return $language->code == \App::getLocale();
        });

        $data['contact_us'] =  \App\ContactUs::withDescription()->online()->arrange()->get();
        $data['footer_business'] = \App\Business::withDescription()->online()->arrange()->get();
        $data['evnet_page'] = \App\EventPage::withDescription()->online()->firstOrFail();
        $data['setting'] = \App\SystemSetting::withDescription()->firstOrFail();
        // dd($data['setting']);
      
        return $callback($data);
    }

    public function getSeo($models = [], $description = null, $image = null){
        return \App\Seo::getSeo($models, $description, $image);
    }

}
