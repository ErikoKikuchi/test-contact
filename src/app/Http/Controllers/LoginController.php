<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //ログイン画面表示
    public function index(){
        return view ('login');
    }

    //ユーザー登録画面表示
    public function create(){
        return view ('login');
    }

    //ログアウト
    public function logout(){
        return view ('login');
    }
}
