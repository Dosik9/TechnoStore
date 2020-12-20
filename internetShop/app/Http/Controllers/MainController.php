<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $categories =Category::all()->random(3);
        $caths=Category::all();
        $order=Order::all();

        $newproducts = Product::all()->where('id','>',Product::max('id')-Product::all()->count()+1);

        return view('index', compact(['categories', 'newproducts', 'caths','order']));
    }

    public function header(){
        $categories =Category::all();
        $products = Product::all();
        return view('templates', compact(['categories']));
    }




    public function product($prod){
        $caths =Category::all();
        $product=Product::find($prod);
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
}
