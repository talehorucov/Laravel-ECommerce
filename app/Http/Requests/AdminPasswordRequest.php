<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => 'required|min:6|max:10',
            'password' => 'required|min:6|max:10',
            'password_confirmation' => 'same:password'
        ];
    }

    public function attributes()
    {
        return [
            'current_password' => 'Hazırki Şifrə',
            'password' => 'Keçmiş Şifrə',
            'password_confirmation' => 'Şifrə'
        ]; 
    }        
}
