@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('nav')
    <ul class = "header-nav">
        <li class = "header-nav__item">
            <a class ="header-nav__link--register" href="/register">register</a>
        </li>
    </ul>
@endsection

@section('content')

<div class = "login__content">
    <h2 class = "login-form__title">Login</h2>
    <form class = "login-form" action = "/login" method = "post">
        @csrf
        <div class ="login-form__group">
            <div class ="login-form__group-title">
                <span class ="login-form__label--item">メールアドレス</span>
            </div>
            <div class ="login-form__group-content">
                <div class ="login-form__input-text">
                    <input class="login-form__input-email" type = "text" name="email" placeholder="例：test@example.com" value="{{old('email')}}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class ="login-form__group">
            <div class ="login-form__group-title">
                <span class ="login-form__label--item">パスワード</span>
            </div>
            <div class ="login-form__group-content">
                <div class ="login-form__input-text">
                    <input class="login-form__input-password" type = "password" name="password" placeholder="例：coachtech1106"  />
                </div>
                <div class="form__error">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="login-form__button">
            <button class ="login-form__button--submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection