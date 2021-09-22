<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBrandCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Input Brand Name.',
            'name.min' => 'Brand Name must be at least 6 characters.',
        ];
    }
}
