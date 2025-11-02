<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;

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

    //CSV出力
    public function exportCsv(){
        $contacts = Contact::with('category')->get();
    
    $csvHeader = [
        'ID','お問い合わせ内容','姓','名','性別','メールアドレス','電話番号','住所','建物','詳細','お問い合わせ日'
    ];
    $temps = [];
    array_push($temps, $csvHeader);

    foreach ($contacts as $contact) {
        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他'
        ];
        $categoryText = [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他'
        ];
        $gender = $genderText[$contact->gender];
        $category = $categoryText[$contact->category_id];


        $temp = [
            $contact->id,
            $category,
            $contact->first_name,
            $contact->last_name,
            $gender,
            $contact->email,
            $contact->tel,
            $contact->address,
            $contact->detail,
            $contact->created_at,
            ];
            array_push($temps, $temp);
        }
        $stream = fopen('php://temp', 'r+b');
        foreach ($temps as $temp) {
            fputcsv($stream, $temp);
        }
        rewind($stream);
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        $now = now();
        $filename = "ユーザー一覧（全件：" . $now->format('Y年m月d日'). "）.csv";
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$filename,
        );
        return Response::make($csv, 200, $headers);
    }

}