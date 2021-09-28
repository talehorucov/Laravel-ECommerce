<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSliderUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'max:255',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Please Select an Image.',
        ];
    }
}
