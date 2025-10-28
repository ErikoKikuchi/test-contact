<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //管理画面表示
    public function index(){
        return view ('admin');
    }

    //詳細画面モーダル表示
    public function show(){
        return view ('delete');
    }

    //詳細画面から削除
    public function destroy(){
        return view('admin');
    }

    //検索
    public function search(){
        return view('admin');
    }

    //リセット
    public function reset(){
        return view('admin');
    }

}
