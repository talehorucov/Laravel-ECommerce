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
            'category_id' => 'exists:categories,id|required',
            'name' => 'required|min:2|max:35',
        ];
    }

    public function attributes()
    {
        return[
            'category_id' => 'Kateqoriya',
            'name' => 'Alt Kateqoriya Adı',
        ];        
    }
}
