<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
    return view('register');
    }

    public function store(RegisterRequest $request){
        $form=$request->validated();
        $form['password']=bcrypt($form['password']);
        User::create($form);
    return view('login')->with('success', '登録に成功しました');
    }
}
