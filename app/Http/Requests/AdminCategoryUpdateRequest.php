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
            'name' => 'required|min:2|max:35',
            'icon' => 'required|min:5|max:70'
        ];
    }

    public function attributes()
    {
        return[
            'name' => 'Şəkil',
            'icon' => 'İkon',
        ];        
    }
}
