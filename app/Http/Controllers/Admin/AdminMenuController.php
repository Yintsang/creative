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
                    'popup' => 'Popup',
                    'home_page' => 'Page Contents',
                    'home_banner' => 'Top Banners',
                ]
            ],
            [
                'name' => 'About Us',
                'sections' => [
                    'about_us_page' => 'Page Content',
                    'about_us_history' => 'Our History',
                    'about_us_mission' => 'Our Mission',
                    'about_us_business' => 'Business Opportunity',
                ]
            ],
            [
                'name' => 'Business',
                'sections' => [
                    'business' => 'Business',
                    'collection' => 'Collection',
                    'supplier' => 'Supplier',
                    'series' => 'Series',
                    'product' => 'Product',
                ]
            ],
            [
                'name' => 'Event',
                'sections' => [
                    'event_page' => 'Event Page',
                    'event' => 'Event',
                    // 'event_tag' => 'Event Tag',
                ]
            ],
            [
                'name' => 'Partners',
                'sections' => [
                    'partners' => 'Partners',
                ]
            ],
            [
                'name' => 'Client',
                'sections' => [
                    'client' => 'Client',
                ]
            ],
            [
                'name' => 'Location',
                'sections' => [
                    'pos_location_category' => 'Location',
                ]
            ],
            [
                'name' => 'Shop',
                'sections' => [
                    'online_shop' => 'Online Shop',
                    'retail_shop' => 'Retail Shop',
                ]
            ],
            [
                'name' => 'Contact Us',
                'sections' => [
                    'contact_us' => 'Contact Us',
                ]
            ],
            // [
            //     'name' => 'Collection',
            //     'sections' => [
            //         'collection' => 'Collection',
            //     ]
            // ],
            // [
            //     'name' => 'supplier',
            //     'sections' => [
            //         'supplier' => 'Supplier',
            //     ]
            // ],
            // [
            //     'name' => 'series',
            //     'sections' => [
            //         'series' => 'Series',
            //     ]
            // ],
            // [
            //     'name' => 'product',
            //     'sections' => [
            //         'product' => 'Product',
            //     ]
            // ],
            // [
            //     'name' => 'Footer',
            //     'sections' => [
            //         'footer' => 'Footer',
            //     ]
            // ],
        ];
    }
    
}
