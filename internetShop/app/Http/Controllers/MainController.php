<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
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
        $order=Order::all();

//        $newproducts = Product::all()->where('id','>',Product::max('id')-Product::all()->count()+1);
        $newproducts = Product::all();


        return view('index', compact(['categories', 'newproducts', 'caths','order']));
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
        $order=Order::all();
//        dd($product);
        return view('product',compact(['product','caths','products','order']));
    }

    public function p_store(){
        $caths=Category::all();
        $brands=Brand::all();
        $products=Product::all();
        $top_sellings=Product::all()->where('id','>',Product::max('id')-3);
//        dd($top_sellings);
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
