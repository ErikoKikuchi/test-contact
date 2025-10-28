<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //お問い合わせ画面表示
    public function index()
    {
        $categories = Category::all();
        return view('contacts',compact('categories'));
    }
    //お問い合わせ確認画面表示
    public function confirm(Request $request)
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
        'detail'
    ]);
    $contact['tel'] = $contact['tel1'] . $contact['tel2'] . $contact['tel3'];

    return view('confirm',compact('contact'));
    }
    //サンクス画面表示
    public function store(Request $request){
        $contact = $request->only([
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
        ]);
        Contact::create($contact);

    return view('thanks');
    }

}
