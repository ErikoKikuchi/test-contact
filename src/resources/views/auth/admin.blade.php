@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('nav')
    @auth
    <ul class = "header-nav">
        <li class = "header-nav__item">
            <a class ="header-nav__link--auth" href="/login">logout</a>
        </li>
    </ul>
    @endauth
@endsection

@section('content')
@auth
<div class="admin__index">
    <h2 class="admin-index__title">Admin</h2>
    <form class="search-form" action="/admin/search" method="get">
        <div class="search-form__item">
            <input class="search-form__item--input" type="text" name="keyword" value="{{old('keyword')}}" placeholder="名前やメールアドレスを入力してください">
            <select class="search-form__item--gender-select" name="gender" >
                <option value="">性別</option>
                <option value="1"{{ request('gender')==1 ? 'selected' : ''}}>男性</option>
                <option value="2"{{ request('gender')==2 ? 'selected' : ''}}>女性</option>
                <option value="3"{{ request('gender')==3 ? 'selected' : ''}}>その他</option>
            </select>
            <select class="search-form__item--category-select" name="category_id" >
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
            <input class="search-form__item--date-select" type="date"name="created_at" value="{{ old('created_at') }}">
            </input>
        </div>
        <div class="search-form__button">
            <button class="search-form__button--submit" type="submit">検索</button>
        </div>
    </form>
    <form class="reset-form" action="/admin/reset" method="get">
        <div class="reset-form__button">
            <button class="reset-form__button--submit" type="submit">リセット</button>
        </div>
    </form>
    <div class="admin-index__table">
        <div class ="admin-index__pagination"">
        {{$contacts->links('pagination::tailwind')}}
        </div>
        <table class="admin-table__inner">
            <thead>
                <tr class="admin-table__row">
                    <th class="admin-table__header">お名前</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせの種類</th>
                    <th class="admin-table__header"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td class ="admin-table__item">
                    {{ $contact->first_name }} {{ $contact->last_name }}
                    </td>
                    <td class ="admin-table__item">
                    {{ $contact->gender_text ?? $contact->gender }}
                    </td>
                    <td class ="admin-table__item">
                    {{ $contact->email}}
                    </td>
                    <td class ="admin-table__item">
                    {{ $contact->category_id_text}}
                    </td>
                    <td class="admin-table__button">
                    @livewire('modal', ['contactId' => $contact->id], key('modal-'.$contact->id))
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth
@endsection