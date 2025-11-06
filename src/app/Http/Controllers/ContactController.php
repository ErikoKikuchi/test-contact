<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    //お問い合わせ画面表示
    public function index()
    {
        $categories = Category::all();
    return view('contacts',compact('categories'));
    }
    //お問い合わせ確認画面表示
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel1',
        'tel2',
        'tel3',
        'address',
        'building',
        'category_id',
        'detail'
        ]);
        $genderText = [1=>'男性',2=>'女性',3=>'その他'];
        $contact['gender_text']=$genderText[$contact['gender']];
        $category = Category::find($request->category_id);
        $contact['category_content'] = $category->content;

    return view('confirm',compact('contact'));
    }

    //修正のため入力画面に戻る
    public function edit(Request $request){
        return redirect('/')->withInput($request->all());
    }

    //送信処理
    public function store(Request $request){
        $contact = $request->only([
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
        ]);
        Contact::create($contact);
    return redirect('/thanks');
    }
}