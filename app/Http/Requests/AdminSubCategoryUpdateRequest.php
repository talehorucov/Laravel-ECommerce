<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSubCategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required|min:2|max:35'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Select Select Any Option.',
            'name.required' => 'Input English Name of the SubCategory.',
            'name.min' => 'English Name of the SubCategory must be at least 6 characters.',
        ];
    }
}
