<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSubSubCategoryCreateRequest extends FormRequest
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
            'name' => 'required|min:2|max:35',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Select Select Any Option.',
            'subcategory_id.required' => 'Select Select Any Option.',
            'name.required' => 'Input English Name of the SubCategory.',
            'name.min' => 'Azerbaijani Name of the SubCategory must be at least 6 characters.',
        ];
    }
}
