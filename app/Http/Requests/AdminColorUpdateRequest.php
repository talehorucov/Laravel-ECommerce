<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminColorUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255'
        ];
    }
}
