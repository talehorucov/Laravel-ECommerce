<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'color' => 'required|numeric',
            'size' => 'numeric',
            'quantity' => 'required|numeric|min:1'
        ];
    }
}
