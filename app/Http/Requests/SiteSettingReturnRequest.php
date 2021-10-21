<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingReturnRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'phone_one' => 'max:20',
            'phone_two' => 'max:20',
            'email' => 'max:100',
            'company_name' => 'max:255',
            'company_address' => '',
            'facebook' => 'max:255',
            'linkedin' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'phone_one.max' => '20 karakterdən az olmalıdır',
            'phone_two.max' => '20 karakterdən az olmalıdır',
            'email.max' => '100 karakterdən az olmalıdır',
            'company_name.max' => '255 karakterdən az olmalıdır',
            'facebook.max' => '255 karakterdən az olmalıdır',
            'linkedin.max' => '255 karakterdən az olmalıdır',
        ];
        
    }
}
