<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
            'email' => ['required','email'],
            'password' =>'required'
        ];
    }

    //未入力の場合
    public function messages()
    {
        return[
            'email.required'=>'メールアドレスを入力してください',
            'password.required' =>'パスワードを入力してください'
        ];
    }

    //ログイン情報が登録されていないとき
    public function withValidator($validator){
    if(! Auth::attempt($this->only('email','password'))){
        $validator->errors()->add('email','ログイン情報が登録されていません');
    }}
}
