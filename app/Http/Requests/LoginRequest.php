<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required | email',
            'password' => 'required | min:6 | max:15'
        ];
    }

    public function messages()
    {
        return[
            'email.required'=>'vui long nhap email',
            'email.email'=>'email da ko dung dinh dang',
            'password.required'=>'vui long nhap password',
            'password.min'=>'password toi thieu 6 ki tu',
            'password.max'=>'password toi da 15 ki tu'
        ];
    }
}
