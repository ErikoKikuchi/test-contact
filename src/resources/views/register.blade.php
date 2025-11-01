@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('nav')
    <ul class = "header-nav--inner">
        <li class = "header-nav__item">
            <a class ="header-nav__link--login" href="/login">login</a>
        </li>
    </ul>
@endsection

@section('content')
<div class = "register__content">
    <h2 class = "register-form__title">Register</h2>
    <form class = "register-form" action = "/register/store" method = "post">
        @csrf
        <div class ="register-form__group">
            <div class ="register-form__group-title">
                <span class ="register-form__label--item">お名前</span>
            </div>
            <div class ="register-form__group-content">
                <div class ="register-form__input-text">
                    <input class ="register-form__input-name" type = "text" name="name" placeholder="例：山田太郎" value="{{old('name')}}" />
                </div>
                <div class="form__error">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class ="register-form__group">
            <div class ="register-form__group-title">
                <span class ="register-form__label--item">メールアドレス</span>
            </div>
            <div class ="register-form__group-content">
                <div class ="register-form__input-text">
                    <input class ="register-form__input-email" type = "text" name="email" placeholder="例：test@example.com" value="{{old('email')}}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class ="register-form__group">
            <div class ="register-form__group-title">
                <span class ="register-form__label--item">パスワード</span>
            </div>
            <div class ="register-form__group-content">
                <div class ="register-form__input-text">
                    <input class ="register-form__input-password" type = "password" name="password" placeholder="例：coachtech1106" />
                </div>
                <div class="form__error">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register-form__button">
            <button class ="register-form__button--submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection