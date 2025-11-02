<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //管理画面表示
    public function index(){
        $contacts = Contact::with('category')->paginate(8)->withQueryString();
        $categories=Category::all();

        return view ('auth.admin',compact('contacts','categories'));
    }


    //検索
    public function search(Request$request){
        $contacts= Contact::with('category')->GenderSearch($request->gender)->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->DateSearch($request->created_at)->paginate(8)->withQueryString();
        $categories =Category::all();
        return view('auth.admin',compact('contacts','categories'));
    }

    //リセット
    public function reset(){
    $contacts = Contact::with('category')->paginate(8)->withQueryString();
    $categories = Category::all();

    return view('auth.admin', compact('contacts', 'categories'));


}
}