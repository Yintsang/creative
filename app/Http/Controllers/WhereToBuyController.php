<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhereToBuyController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        return parent::output(function($data){
            // $data['wheretobuy'] = \App\WhereToBuy::withDescription()->first();
            $data['online_shop'] = \App\OnlineShop::withDescription()->online()->arrange()->get();
            $data['brand'] = \App\Supplier::withDescription()->online()->arrange()->get();
            $data['regions'] = \App\PosLocation::withDescription()->arrange()->get();
            $data['all_location'] = \App\PosLocationCategory::withDescription()->online()->arrange()->where('parent_id',0)->with(['child_cats' => function ($query) {
                $query->withDescription()->online()->arrange()->with(['childs' => function($query){
                    $query->withDescription()->online()->arrange();
                }]);
            },'childs'=> function($query){
                $query->withDescription()->online()->arrange();
            }])->online()->arrange()->get();
            // dd($data['all_location']);
            $location_category_id = 1; //Hong Kong
            $location_category = \App\PosLocationCategory::findOrFail($location_category_id);
            $data['location_categories'] = $location_category->child_cats()->withDescription()->with(['childs' => function($query){
                $query->withDescription()->online()->arrange()->with(['retail_shops' => function($query){
                    $query->withDescription()->online()->arrange();
                }])->whereHas('retail_shops', function($query){
                    $query->online();
                });
            }])->whereHas('childs.retail_shops', function($query){
                $query->online();
            })->online()->arrange()->get();
            // dd($data['location_categories']);
            // $data['retail_shop'] = \App\RetailShop::withDescription()->online()->arrange()->get();
            // $data['seo'] = $this->getSeo($data['wheretobuy']);
            // dd($data['about_us_history']->content);
            // dd($data['location_categories']);
            return view('frontend.wheretobuy', $data);
        });
    }

    public function submit(Request $request){
        // // $location_list = request()->all()['location'];
        // // $data['LocationsArea'] = \App\LocationsArea::whereIn('district_id', $location_list)->get();
        // $business = \App\Business::withDescription()->slug($slug)->online()->firstOrFail();
        // $products = $business->product()->with(['collection' => function($query){
        //     $query->withDescription()->online()->arrange();
        // }])->withDescription()->online()->arrange()->get();
        return $this->getShop(request('shop_type'),request('brand_type'),request('region_type'),request('location_type'),request('district_type'));
    }

    function getShop($shop_type, $brand_type, $region_type, $location_type, $district_type){
        if($shop_type == "online"){
            // $data['online_shop'] = \App\OnlineShop::withDescription()->online()->arrange()->get();
            // foreach($data['online_shop'] as $shop){
            //     $shop->images = $shop->getMedia('logo', true);
            // }
            // $shop = $data;
            $online_shop = \App\OnlineShop::withDescription()->online()->firstOrFail();
            $data['online_shop'] = $online_shop->with(['supplier' => function($query){
                $query->withDescription()->online()->arrange();
            }])->where(function($query){
                if(request('brand_type') != 'all'){
                    if($supplier_id = request('brand_type')){
                        $query->whereHas('supplier', function($query) use($supplier_id){
                            $query->whereId($supplier_id)->online();
                        });
                    }
                }
            })->withDescription()->online()->arrange()->get();
            foreach($data['online_shop'] as $item){
                $item->images = $item->getMedia('logo', true);
            }
            $shop = $data;
            // dd($shop);
        }
        else if($shop_type == "retail"){

            // $location_category_id = $region_type;
            // $location_category = \App\PosLocationCategory::findOrFail($location_category_id);
            // $data['location_categories'] = $location_category->child_cats()->withDescription()->with(['childs' => function($query){
            //     $query->withDescription()->online()->arrange()->with(['retail_shops' => function($query){
            //         $query->withDescription()->online()->arrange();
            //     }])->whereHas('retail_shops', function($query){
            //         $query->online();
            //     });
            // }])->whereHas('childs.retail_shops', function($query){
            //     $query->online();
            // })->online()->arrange()->get();

            $retail_shop = \App\RetailShop::withDescription()->online()->firstOrFail()->orderBy('district_id', 'DESC');
            $data['retail_shop'] = $retail_shop->with(['supplier' => function($query){
                $query->withDescription()->online()->arrange();
            }])->where(function($query){
                if(request('brand_type') != 'all'){
                    if($supplier_id = request('brand_type')){
                        $query->whereHas('supplier', function($query) use($supplier_id){
                            $query->whereId($supplier_id)->online();
                        });
                    }
                }
            });
            if(isset($district_type)){
                if($district_type != 'all'){
                    $data['retail_shop']->where(function($query){
                        if($district_id = request('district_type')){
                            $query->whereHas('district', function($query) use($district_id){
                                $query->whereId($district_id)->online();
                            });
                        }
                    });
                }
            }
            $data['retail_shop'] = $data['retail_shop']->withDescription()->online()->arrange()->get();
            foreach($data['retail_shop'] as $item){
                $pos_location_id = DB::table('pos_location')->where('id', $item->district_id)->first();
                if($pos_location_id->parent_id == 9 ){ //Hard Code for Macau
                    $item->location_id = $pos_location_id->id;
                }
                else{
                    $item->location_id = $pos_location_id->parent_id;
                }
                // $pos_location_slug = DB::table('pos_location_description')->where('description_id', $pos_location_id->id)->where('language_id', '1')->first();
                // $item->location_title = $pos_location_slug->title;
                $pos_district_slug = DB::table('pos_location_description')->where('description_id', $item->district_id)->where('language_id', '1')->first();
                $item->district_title = $pos_district_slug->title;
                // $item->images = $item->getMedia('logo', true);
            }
            
            // if(isset($location_type)){
            //     foreach($data['retail_shop'] as $item=>$location_id){
            //         if($location_id != $location_type){
            //             unset($data['retail_shop'][$item]);
            //         }
            //     }
            // }
            foreach($data['retail_shop'] as $item){
                $item->images = $item->getMedia('logo', true);
            }
            $location_id_ar = [];
            if($region_type != 'all' && $region_type != '' && !is_null($region_type)){
                $region = \App\PosLocationCategory::findOrFail($region_type);
                $data['locations'] = $region->child_cats()->withDescription()->with(['childs' => function($query){
                    $query->withDescription()->online()->arrange()->whereHas('retail_shops', function($query){
                        $query->online();
                    });
                }])->whereHas('childs.retail_shops', function($query){
                    $query->online();
                })->online()->arrange()->get();
                for($i=0;$i<sizeof($data['locations']);$i++){
                    array_push($location_id_ar,$data['locations'][$i]['id']);
                }
            }
            $data['all_location'] = \App\PosLocation::withDescription()->online()->arrange()->get();
            $data['all_location_categorys'] = \App\PosLocationCategory::withDescription()->online()->arrange()->get();
            // var_dump("Type: ".$district_type);
            // for($i=0;$i<sizeof($data['retail_shop']);$i++){
            //     if($data['retail_shop'][$i]['district_id'] != intval($district_type)){
            //         var_dump($data['retail_shop'][$i]['district_id']);
            //         unset($data['retail_shop'][$i]);
            //     }
            //     else{
            //         var_dump("Not: ".$data['retail_shop'][$i]['district_id']);
            //     }
            // }
            // $data['retail_shop'] = array_values($data['retail_shop']);
            // print_r($data['locations'][0]['title']);
            // dd($data['locations']);
            // $data['all_location'] = \App\PosLocationCategory::withDescription()->online()->arrange();
            // if($region_type != 'all'){
            //     $data['all_location']->where('id',$region_type);
            // }
            // $data['all_location']->get();
            // if($location_category->has_child_category == 1){
            //     $location_category_data = \App\PosLocationCategory::findOrFail($region_type);
            //     $data['location_categories'] = $location_category_data->child_cats()->withDescription()->with(['childs' => function($query){
            //         $query->withDescription()->online()->arrange()->with(['retail_shops' => function($query){
            //             $query->withDescription()->online()->arrange();
            //         }])->whereHas('retail_shops', function($query){
            //             $query->online();
            //         });
            //     }])->whereHas('childs.retail_shops', function($query){
            //         $query->online();
            //     })->online()->arrange()->get();
            // }
            // else{
            //     // var_dump("4");
            // }
            // echo "<pre>";
            // dd($data['location_categories']);
            
            $shop = $data;
            // echo "</pre>";
        }
        else{
            $online_shop = \App\OnlineShop::withDescription()->online()->firstOrFail();
            $data['online_shop'] = $online_shop->with(['supplier' => function($query){
                $query->withDescription()->online()->arrange();
            }])->where(function($query){
                if(request('brand_type') != 'all'){
                    if($supplier_id = request('brand_type')){
                        $query->whereHas('supplier', function($query) use($supplier_id){
                            $query->whereId($supplier_id)->online();
                        });
                    }
                }
            })->withDescription()->online()->arrange()->get();
            foreach($data['online_shop'] as $item){
                $item->images = $item->getMedia('logo', true);
            }
            // $retail_shop = \App\RetailShop::withDescription()->online()->firstOrFail();
            // $data['retail_shop'] = $retail_shop->with(['supplier' => function($query){
            //     $query->withDescription()->online()->arrange();
            // }])->where(function($query){
            //     if(request('brand_type') != 'all'){
            //         if($supplier_id = request('brand_type')){
            //             $query->whereHas('supplier', function($query) use($supplier_id){
            //                 $query->whereId($supplier_id)->online();
            //             });
            //         }
            //     }
            // })->withDescription()->online()->arrange()->get();
            // foreach($data['retail_shop'] as $item){
            //     $item->images = $item->getMedia('logo', true);
            // }
            // $shop = $data;
            $retail_shop = \App\RetailShop::withDescription()->online()->firstOrFail()->orderBy('district_id', 'DESC');
            $data['retail_shop'] = $retail_shop->with(['supplier' => function($query){
                $query->withDescription()->online()->arrange();
            }])->where(function($query){
                if(request('brand_type') != 'all'){
                    if($supplier_id = request('brand_type')){
                        $query->whereHas('supplier', function($query) use($supplier_id){
                            $query->whereId($supplier_id)->online();
                        });
                    }
                }
            });
            if(isset($district_type)){
                if($district_type != 'all'){
                    $data['retail_shop']->where(function($query){
                        if($district_id = request('district_type')){
                            $query->whereHas('district', function($query) use($district_id){
                                $query->whereId($district_id)->online();
                            });
                        }
                    });
                }
            }
            $data['retail_shop'] = $data['retail_shop']->withDescription()->online()->arrange()->get();
            foreach($data['retail_shop'] as $item){
                $pos_location_id = DB::table('pos_location')->where('id', $item->district_id)->first();
                if($pos_location_id->parent_id == 9 ){ //Hard Code for Macau
                    $item->location_id = $pos_location_id->id;
                }
                else{
                    $item->location_id = $pos_location_id->parent_id;
                }
                // $pos_location_slug = DB::table('pos_location_description')->where('description_id', $pos_location_id->id)->where('language_id', '1')->first();
                // $item->location_title = $pos_location_slug->title;
                $pos_district_slug = DB::table('pos_location_description')->where('description_id', $item->district_id)->where('language_id', '1')->first();
                $item->district_title = $pos_district_slug->title;
                // $item->images = $item->getMedia('logo', true);
            }
            
            // if(isset($location_type)){
            //     foreach($data['retail_shop'] as $item=>$location_id){
            //         if($location_id != $location_type){
            //             unset($data['retail_shop'][$item]);
            //         }
            //     }
            // }
            foreach($data['retail_shop'] as $item){
                $item->images = $item->getMedia('logo', true);
            }
            $location_id_ar = [];
            if($region_type != 'all' && $region_type != '' && !is_null($region_type)){
                $region = \App\PosLocationCategory::findOrFail($region_type);
                $data['locations'] = $region->child_cats()->withDescription()->with(['childs' => function($query){
                    $query->withDescription()->online()->arrange()->whereHas('retail_shops', function($query){
                        $query->online();
                    });
                }])->whereHas('childs.retail_shops', function($query){
                    $query->online();
                })->online()->arrange()->get();
                for($i=0;$i<sizeof($data['locations']);$i++){
                    array_push($location_id_ar,$data['locations'][$i]['id']);
                }
            }
            $data['all_location'] = \App\PosLocation::withDescription()->online()->arrange()->get();
            $data['all_location_categorys'] = \App\PosLocationCategory::withDescription()->online()->arrange()->get();
            $shop = $data;
        }
        // $slug = request()->all()['business'];
        // $business = \App\Business::withDescription()->slug($slug)->online()->firstOrFail();
        // $products = $business->product()->with(['collection' => function($query){
        //     $query->withDescription()->online()->arrange();
        // }, 'supplier' => function($query){
        //     $query->withDescription()->online()->arrange();
        // }])->where(function($query){
        //     if($supplier_id = request('supplier')){
        //         $query->where('supplier_id', $supplier_id);
        //     }
        //     if($collection_id = request('collection')){
        //         $query->whereHas('collection', function($query) use($collection_id){
        //             $query->whereId($collection_id)->online();
        //         });
        //     }
        // })->withDescription()->online()->arrange()->get();
        // for($i=0;$i<sizeof($products);$i++){
        //     $data['series'] = \App\Series::withDescription()->where("id",$products[$i]['series_id'])->online()->arrange()->get();
        //     $products[$i]['series'] = $data['series'][0]['title'];
        // }
        // foreach($products as $product){
        //     $product->images = $product->getMedia('image', true);
        // }
        return $shop;
    }
}
