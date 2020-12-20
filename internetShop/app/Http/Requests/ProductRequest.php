<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'=>'required|unique:products,name',
            'slug_name'=>'required|unique:products,slug_name',
            'desc'=>'required',
            'price'=>'required|numeric:1',
            'brand_id'=>'required',
            'category_id'=>'required'
        ];
        if($this->route()->named('products.update')){
//            dd();
            $rules['name'] .= ','. $this->route()->parameter('product')->id;
            $rules['slug_name'] .= ','. $this->route()->parameter('product')->id;
        }
        return $rules;
    }
}
