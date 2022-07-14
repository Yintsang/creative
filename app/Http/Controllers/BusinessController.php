<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends BaseFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index($slug)
    {
        return parent::output(function($data) use($slug){
            $data['business_page'] = \App\Business::withDescription()->first();
            $data['business'] = \App\Business::withDescription()->slug($slug)->online()->firstOrFail();
            // $data['seo'] = $this->getSeo($data['business_page']);
            $data['seo'] = $this->getSeo($data['business']);
            $data['supplier'] = \App\Supplier::withDescription()->online()->arrange()->get();
            $data['series'] = \App\Series::withDescription()->online()->arrange()->get();
            $data['collection'] = $data['business']->business_collection()->withDescription()->online()->arrange()->get();
            foreach($data['collection'] as $collection){
                $collection->initRepeater();
            }
            $data['product'] = $this->getProducts($slug);
            $product_id = "";
            foreach($data['product'] as $product){
                $product->getMedia('image', true);
                $product_id = $product->id;
            }
            $query = $data['business']->business_collection()->withDescription()->online()->arrange();
            $data['product_collection'] = $query->get();
            $data['product_business'] = $data['business']->product()->withDescription()->online()->arrange()->get();
            // $query = $data['business']->product()->withDescription()->online()->arrange();
            // $query->where(function ($query) use ($product_id) {
            //     $query->whereIn('id', ['2']);
            // });
            // dd($data['product_business']);
            // $data['product_business'] = $query->get();
            // dd($data['product_business']);
            // $data['product_business'] = \App\Product::withDescription()->online()->arrange()->get();
            // $data['product_supplier'] = $data['product_business']->supplier()->withDescription()->online()->arrange()->get();
            // dd($data['product_supplier']);
            foreach($data['product_business'] as $product_business){
                $supplier_id = $product_business->supplier_id;
                $series_id = $product_business->series_id;
                $supplier_query = \App\Supplier::withDescription();
                $supplier_query->where(function ($supplier_query) use ($supplier_id) {
                    $supplier_query->where('id', '=', $supplier_id);
                });
                $product_business->supplier = $supplier_query->firstOrFail();

                $series_query = \App\Series::withDescription();
                $series_query->where(function ($series_query) use ($series_id) {
                    $series_query->where('id', '=', $series_id);
                });
                $product_business->series = $series_query->firstOrFail();
            }
            // $data['product_model'] = \App\Product::withDescription()->online()->arrange()->get();
            // $data['product_supplier'] = $data['product_model']->supplier()->withDescription()->online()->arrange()->get();
            // dd($data['product_supplier']);
            
            // foreach($data['product_business'] as $product_business){
            //     $query = $product_business->product()->withDescription()->online()->firstOrFail();
            //     $query->whereHas('business', function($query) use($slug){
            //         $query->whereIn('id', ['3']);
            //     });
            //     $data['product_business'] = $query->get();
            // }
            // print_r($data['product_business']);
            // $data['collection']->initRepeater();
            // $data['business']->initRepeater();
            // $query = $data['business']->menu_foods()->withDescription()->online();
            // if($cat_ids = request('cats')){
            //     $query->whereHas('menu_cate', function($query) use($cat_ids){
            //         $query->whereIn('id', $cat_ids);
            //     });
            // }
            // $data['foods'] = $query->get();

            // foreach($data['foods'] as $food){
            //     $food->initRepeater();
            // }
            return view('frontend.business', $data);
        });
    }

    public function submit(Request $request){
        // // $location_list = request()->all()['location'];
        // // $data['LocationsArea'] = \App\LocationsArea::whereIn('district_id', $location_list)->get();
        // $business = \App\Business::withDescription()->slug($slug)->online()->firstOrFail();
        // $products = $business->product()->with(['collection' => function($query){
        //     $query->withDescription()->online()->arrange();
        // }])->withDescription()->online()->arrange()->get();
        return $this->getProducts(request('business'));
    }

    function getProducts($slug){
        // $slug = request()->all()['business'];
        $business = \App\Business::withDescription()->slug($slug)->online()->firstOrFail();
        $products = $business->product()->with(['collection' => function($query){
            $query->withDescription()->online()->arrange();
        }, 'supplier' => function($query){
            $query->withDescription()->online()->arrange();
        }])->where(function($query){
            if($supplier_id = request('supplier')){
                $query->where('supplier_id', $supplier_id);
            }
            if($collection_id = request('collection')){
                $query->whereHas('collection', function($query) use($collection_id){
                    $query->whereId($collection_id)->online();
                });
            }
        })->withDescription()->online()->arrange()->get();
        for($i=0;$i<sizeof($products);$i++){
            $data['series'] = \App\Series::withDescription()->where("id",$products[$i]['series_id'])->online()->arrange()->get();
            $products[$i]['series'] = $data['series'][0]['title'];
        }
        foreach($products as $product){
            $product->images = $product->getMedia('image', true);
        }
        return $products;
    }
}
