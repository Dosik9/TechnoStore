<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name', 'slug_name', 'description', 'price', 'image', 'brand_id', 'category_id'];

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
}
