<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
