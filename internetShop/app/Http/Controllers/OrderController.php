<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function basket(){
        $caths=Category::all();
        $orderID=session('orderID');
        if (is_null($orderID)){
            $order=Order::create();
            session(['orderID' => $order->id]);
        }else{
            $order=Order::find($orderID);
        }
        return view('basket', compact(['order','caths']));
    }



    public function order(){
        $caths=Category::all();
        $orderID=session('orderID');
        if(is_null($orderID)){
            return redirect()->route('home');
        }
        $order=Order::find($orderID);
        return view('order',compact(['order','caths']));
    }

    public function confirmOrder(Request $request){
        $orderID=session('orderID');
        if(is_null($orderID)){
            return redirect()->route('home');
        }
        $order=Order::find($orderID);
        $order->saveorder($request->name, $request->telnum);
        if(Auth::check()){
            $order->user_id=Auth::id();
            $order->save();
        }
        return redirect()->route('home',compact('order'));
    }



    public function basketAdd($pID){
        $orderID=session('orderID');
        if (is_null($orderID)){
            $order=Order::create();
            session(['orderID' => $order->id]);
        }else{
            $order=Order::find($orderID);
        }
        if($order->products->contains($pID)){
            $pivotRow=$order->products()->where('product_id',$pID )->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
//            dd($pivotRow);
        }else{
            $order->products()->attach($pID);
        }

        return redirect()->route('basket');
    }

    public function basketRemove($pID){
        $orderID=session('orderID');
        if (is_null($orderID)){
            return redirect()->route('basket',compact('order'));
        }
        $order=Order::find($orderID);
        if($order->products->contains($pID)){
            $pivotRow=$order->products()->where('product_id',$pID )->first()->pivot;
            if($pivotRow->count>=1){
                $order->products()->detach($pID);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        return redirect()->route('basket',compact('order'));
    }

    public function index()
    {
        $orders=Order::all()->where('status',1);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order){
        return view('orders.show',compact('order'));
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order has been deleted!');
    }

}
