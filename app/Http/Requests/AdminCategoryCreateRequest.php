<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:35',
            'icon' => 'required|min:5|max:70'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Input English Name of the Category.',
            'name.min' => 'English Name of the Category must be at least 6 characters.'
        ];
    }
}
