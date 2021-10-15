<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'city_id' => 'required|exists:cities,id',
            'address' => 'required',
            'name' => 'required|min:2|max:50',
            'email' => 'required|min:5|max:100',
            'phone' => 'required|min:7|max:50',
            'post_code' => 'max:15',
        ];
    }
}
