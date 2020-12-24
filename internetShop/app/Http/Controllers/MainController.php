<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use Psy\Util\Str;

class MainController extends Controller
{
    public function index(){
        $categories =Category::all()->random(3);
        $caths=Category::all();
//        $order=Order::all();

//        $newproducts = Product::all()->where('id','>',Product::max('id')-Product::all()->count()+1);
        $newproducts = Product::all()->where('new',1);
        $hitproducts = Product::all()->where('hit',1);


        return view('index', compact(['categories', 'newproducts','hitproducts', 'caths']));
    }

    public function header(){
        $categories =Category::all();
        $products = Product::all();
        return view('templates', compact(['categories']));
    }




    public function product($prod){
//        dd($prod);
        $caths =Category::all();
        $product=Product::where('slug_name',$prod)->first();
        $products=Product::all();
//        $order=Order::all();
//        dd($product);
        return view('product',compact(['product','caths','products']));
    }

    public function p_store(Request $request){
//        dump($request->all());
        $caths=Category::all();
        $brands=Brand::all();
        $top_sellings=Product::all()->where('id','>',Product::max('id')-3);

        $productQuery=Product::query();
        if($request->filled('price_min')){
            $productQuery->where('price','>=',$request->price_min);
        }
        if($request->filled('price_max')){
            $productQuery->where('price','<=',$request->price_max);
        }

        if($request->filled('p_label')){
            if ($request->p_label != 'all') {
                $productQuery->where($request->p_label, 1);
            }
        }

        if($request->filled('n_paginate')){
            $products=$productQuery->paginate($request->n_paginate);
        }else{
            $products=$productQuery->paginate(6);
        }

//        dump($products);
        return view('store',compact(['caths','brands','products', 'top_sellings']));
    }

    public function p_category($c_slug){
//        dd($c_slug);
        $caths =Category::all();
//        $aaa=Category::where('slug_name',$c_slug)->first()->id;
//        dd($aaa);
        $c_products=Product::where('category_id',Category::where('slug_name',$c_slug)->first()->id)->get();
//        dd($c_products);
        return view('category', compact(['caths', 'c_products']));
    }

    public function p_search(Request $request){
        $text=$request->input('word');
//        $words = Str::split($text, '_');
        $yyes=Str::contains(Product::all(),$text);
        dd($yyes);

        return view('result');
    }

    public function changeLang($locale){
        session(['locale'=>$locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

}
