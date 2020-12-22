<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name', 'slug_name', 'description', 'price', 'image', 'brand_id', 'category_id','hit','new','recommend','discount'];

public function brand(){
    return $this->belongsTo(Brand::class);
}

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public  function orders(){
        return  $this->belongsToMany(Order::class);
    }

    public function getcost(){
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function isHit(){
        return $this->hit===1;
    }

    public function isNew(){
        return $this->new===1;
    }

    public function isRecommend(){
        return $this->recommend===1;
    }

    public function isDiscount(){
     return $this->discount>0;
    }

    public function sumDiscount(){
        $sum=($this->price*(100-$this->discount))/100;
//        dd($sum);
        return $sum;
    }
}
