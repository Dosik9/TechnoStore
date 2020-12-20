<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public  function products(){
        return  $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    public  function user(){
        return  $this->belongsTo(User::class);
    }

    public function allsum(){
        $sum=0;
        foreach ($this->products as $product){
            $sum +=$product->getcost();
        }
        return $sum;
    }

    public function saveOrder($name, $telnum){

        if ($this->status==0){
            $this->name=$name;
            $this->telnum=$telnum;
            $this->status=1;
            $this->save();

            session()->forget('orderID');
            return true;
        }else{
            return false;
        }
    }
}
