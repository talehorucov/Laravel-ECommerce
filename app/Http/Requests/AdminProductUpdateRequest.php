<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'name' => 'required|min:2|max:255',
            'code' => 'required|min:2|max:255',
            'quantity' => 'required|max:255',
            'tags' => 'required|max:255',
            'color' => 'required|max:255',
            'selling_price' => 'required|max:255',
            'short_desc' => 'required|max:255',
            'long_desc' => 'required|max:5000',
            'thumbnail' => 'max:255',
            'hot_deals' => 'numeric',
            'featured' => 'numeric',
            'special_offer' => 'numeric',
            'special_deal' => 'numeric'
        ];
    }
}
