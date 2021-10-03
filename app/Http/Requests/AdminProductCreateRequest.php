<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'name' => 'required|min:2|max:255',
            'quantity' => 'required|max:255',
            'tag.*' => 'exists:tags,id',
            'color.*' => 'exists:colors,id',
            'size.*' => 'exists:sizes,id',
            'selling_price' => 'required|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'multi_img.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'hot_deals' => 'numeric',
            'featured' => 'numeric',
            'special_offer' => 'numeric',
            'special_deal' => 'numeric',
        ];
    }
}
