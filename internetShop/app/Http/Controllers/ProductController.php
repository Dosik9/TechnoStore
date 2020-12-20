<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('products.create', compact(['brands', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product=new Product();
        if($request->file('image')!=null){
            $path=$request->file('image')->store('products', 'public');
            $product->image=$path;
        }

        $product->name=$request->input('name');
        $product->slug_name=$request->input('slug_name');
        $product->description=$request->input('desc');
        $product->price=$request->input('price');
        $product->brand_id=$request->input('brand_id');
        $product->category_id=$request->input('category_id');
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('products.edit', compact(['brands', 'categories','product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if($request->file('image')==null){
            $path=$product->image;
        }
        else{
            $path=$request->file('image')->store('categories', 'public');
        }
        $product->image=$path;
        $product->update($request->only('name', 'slug_name', 'description', 'price', 'brand_id', 'category_id'));
        return redirect()->route('products.index')->with('success', 'Product has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted!');
    }


}
