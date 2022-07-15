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
            $hong_kong = \App\PosLocationCategory::withDescription()->online()->arrange();
            $data['retail_shop'] = \App\RetailShop::withDescription()->online()->arrange();
            // $data['seo'] = $this->getSeo($data['wheretobuy']);
            // dd($data['about_us_history']->content);
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
        return $this->getShop(request('shop_type'),request('brand_type'));
    }

    function getShop($shop_type, $brand_type){
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
                if($supplier_id = request('brand_type')){
                    $query->whereHas('supplier', function($query) use($supplier_id){
                        $query->whereId($supplier_id)->online();
                    });
                }
            })->withDescription()->online()->arrange()->get();
            foreach($data['online_shop'] as $item){
                $item->images = $item->getMedia('logo', true);
            }
            $shop = $data;
            // dd($shop);
        }
        else if($shop_type == "retail"){
            // $retail_shop = \App\RetailShop::withDescription()->online()->firstOrFail();
            // $data['retail_shop'] = $retail_shop->with(['supplier' => function($query){
            //     $query->withDescription()->online()->arrange();
            // }])->where(function($query){
            //     if($supplier_id = request('brand_type')){
            //         $query->whereHas('supplier', function($query) use($supplier_id){
            //             $query->whereId($supplier_id)->online();
            //         });
            //     }
            // })->withDescription()->online()->arrange()->get();
        }
        else{

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
