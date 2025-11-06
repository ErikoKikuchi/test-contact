@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class ="confirm__content">
    <h2 class ="confirm__title">Confirm</h2>
        <div class = "confirm-table">
            <table class = "confirm-table__inner">
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-last_name" type="text" name="last_name" value="{{$contact['last_name']}}" readonly>
                        <input class="confirm-table__text-first_name" type="text" name="first_name" value="{{$contact['first_name']}}" readonly>
                    </td>
                </tr>
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-gender" type="text" value="{{$contact['gender_text']}}" readonly>
                    </td>
                </tr>
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-mail" type="email" name="email" value="{{$contact['email']}}" readonly>
                    </td>
                </tr>
                    <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-tel" type="tel" value="{{$contact['tel1']}}{{$contact['tel2']}}{{$contact['tel3']}}" readonly>
                    </td>
                </tr>
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-address" type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input  class="confirm-table__text-address"type="text" name="building" value="{{$contact['building']}}" readonly>
                    </td>
                </tr>
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-select" type="text" value="{{$contact['category_content']}}" readonly>
                    </td>
                </tr>
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">お問い合わせの内容</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__textarea" type="text" name="detail" value="{{$contact['detail']}}" readonly>
                    </td>
                </tr>
            </table>
        </div>
    <div class="confirm__buttons">
    <form class ="confirm-form" action="/contacts/store" method = "post">
        @csrf
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="tel" value="{{$contact['tel1']}}{{$contact['tel2']}}{{$contact['tel3']}}" >
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="category_id" value="{{$contact['category_id']}}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        <button class = "confirm__button--submit" type="submit">送信</button>
    </form>
    <form class ="edit-form" action="/contacts/edit" method="post">
        @csrf
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        <div class ="edit-form__button">
            <button class ="edit-form__button--submit" type="submit">修正</button>
        </div>
    </form>
</div>
</div>

@endsection