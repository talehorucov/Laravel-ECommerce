<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:70',
            'discount' => 'required|integer',
            'validity' => 'required|date',
        ];
    }
}
