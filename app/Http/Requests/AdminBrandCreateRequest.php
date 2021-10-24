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
            'name.required' => 'Brend adı mütləqdir.',
            'name.min' => 'Brend adı ən az 2 karakter olmalıdır.',
            'image.required' => 'Şəkil mütləqdir.'
        ];
    }
}
