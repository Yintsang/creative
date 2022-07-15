<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            $location_category_id = 1;
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
        return $this->getShop(request('shop_type'),request('brand_type'),request('region_type'));
    }

    function getShop($shop_type, $brand_type, $region_type){
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
            $retail_shop = \App\RetailShop::withDescription()->online()->firstOrFail();
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
                // if(request('region_type') != 'all'){
                //     if($region_id = request('region_type')){
                //         $query->where(function (Builder $query) {
                //             return $query->where('active', 1)
                //         })
                //     }
                // }
            })->withDescription()->online()->arrange()->get();
            foreach($data['retail_shop'] as $item){
                $item->images = $item->getMedia('logo', true);
            }
            $shop = $data;
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
            $retail_shop = \App\RetailShop::withDescription()->online()->firstOrFail();
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
            })->withDescription()->online()->arrange()->get();
            foreach($data['retail_shop'] as $item){
                $item->images = $item->getMedia('logo', true);
            }
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
