<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        $data=[
            'email'=>$email,
            'password'=>$password
        ];
        if (!Auth::attempt($data)){
            return redirect()->route('home.showLogin');
        }else{
            session()->put('userLogin',$data);
            return redirect()->route('store.index');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.login');
    }
}
