@extends('layouts.app')

@section('title','パスワード変更')

@section('header')
<header-component></header-component>
@endsection

@section('content')

<div class="p-register">

    <h2>{{ __('Change Password') }}</h2>
    <div class="c-form">
        @if(session('change_password_error'))
        <div class="c-form__error">
            {{ session('change_password_error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('change.password') }}">
            @csrf

            <div class="c-form__group">
                <label for="current">{{ __('Password__current')
                    }}</label>
                <input id="current" type="password" placeholder="パスワード" name="current-password" required autofocus>
            </div>

            <div class="c-form__group">
                <label for="password">{{ __('Password')
                    }}</label>
                <input id="password" type="password" placeholder="パスワード" name="new-password" required autofocus>
            </div>

            <div class="c-form__group">
                <label for="confirm">{{ __('Password__re')
                    }}</label>
                <input id="confirm" type="password" placeholder="パスワード再入力" name="new-password_confirmation" required
                    autofocus>
            </div>

            @error('new-password')
            <p class="c-form__error">
                <strong>{{ $message }}</strong>
            </p>
            @enderror

            @error('new-password_confirmation')
            <p class="c-form__error">
                <strong>{{ $message }}</strong>
            </p>
            @enderror

            <div class="c-form__group">
                <div class="c-single-button-group">
                    <button type="submit" class="btn-dark">{{ __('Change') }}</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@section('footer')
<footer-component></footer-component>
@endsection