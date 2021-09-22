<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_eng' => 'required|min:2|max:35',
            'name_aze' => 'required|min:2|max:35',
            'icon' => 'required|min:5|max:70'
        ];
    }

    public function messages()
    {
        return [
            'name_eng.required' => 'Input English Name of the Category.',
            'name_eng.min' => 'English Name of the Category must be at least 6 characters.',
            'name_aze.required' => 'Input Azerbaijani Name of the Category.',
            'name_aze.min' => 'Azerbaijani Name of the Category must be at least 6 characters.',
        ];
    }
}
