<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    //ログイン画面
    public function login(LoginRequest $request){
        //ログイン成功
            $request->session()->regenerate();
            return redirect()->intended('/admin');

        //パスワード違い
            return back()->withErrors([
                'password'=>'パスワードに誤りがあります'
            ])->onlyInput('email');
        }

    //ログアウト
    public function logout(){
        return view ('login');
    }
}
