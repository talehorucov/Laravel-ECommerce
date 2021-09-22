<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSubCategoryCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name_eng' => 'required|min:2|max:35',
            'name_aze' => 'required|min:2|max:35',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Select Select Any Option.',
            'name_eng.required' => 'Input English Name of the SubCategory.',
            'name_eng.min' => 'English Name of the SubCategory must be at least 6 characters.',
            'name_aze.required' => 'Input Azerbaijani Name of the SubCategory.',
            'name_aze.min' => 'Azerbaijani Name of the SubCategory must be at least 6 characters.',
        ];
    }
}
