<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username'=>"bail|required|min:3",
            'email'=>'bail|required|email|unique:users,email',
            'password'=>'bail|required|min:6',
            'password_confirm'=>'bail|required|min:6|same:password'
//            regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'])

        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'username không được để trống',
            'username.min'=>'username ít nhất có 3 ký tự',
            'email.required'=>'emai không được để trống',
            'email.email'=>'email phải đúng định dạng',
            'email.unique'=>'email đã được sử dụng',
            'password.required'=>'password không được để trống',
            'password.min'=>'password ít nhất 6 ký tự',
            'password_confirm.same'=>'Xác nhận mật khẩu không chính xác'
        ];
    }
}
