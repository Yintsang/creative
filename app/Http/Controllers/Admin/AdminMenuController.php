<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMenuController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function getMenus()
    {
        return 
        [
            [
                'name' => 'Home Page',
                'sections' => [
                    'home_page' => 'Page Contents',
                    'home_banner' => 'Top Banners',
                ]
            ],
            // [
            //     'name' => 'Home Page',
            //     'sections' => [
            //         'home_page' => 'Page Contents',
            //     ]
            // ],
        ];
    }
    
}
