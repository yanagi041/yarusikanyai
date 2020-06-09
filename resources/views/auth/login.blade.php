@extends('layouts.app')

@section('title','ログイン')

@section('header')
<header-component></header-component>
@endsection

@section('content')
<div class="p-login">

    <h2>{{ __('Login') }}</h2>
    <div class="c-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="c-form__group">
                <label for="email">{{ __('E-Mail Address')
                    }}</label>
                <div>
                    <input id="email" type="email" placeholder="メールアドレス"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <p class="c-form__error">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror

                </div>
            </div>

            <div class="c-form__group">
                <label for="password">{{ __('Password')
                    }}</label>

                <div>
                    <input id="password" type="password" placeholder="パスワード"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                    <p class="c-form__error">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
            </div>

            <div class="c-form__group">
                <div class="form-check">
                    <label class="form-check-label" for="remember">

                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>{{ __('ログイン情報を記憶') }}</span>
                    </label>
                </div>
            </div>

            <div class="c-form__group">
                <div class="c-single-button-group">
                    <div>
                        <button type="submit" class="btn-dark">
                            {{ __('Login') }}
                        </button>
                        <div class="c-link__under-button">
                            <!-- @if (Route::has('password.request')) -->
                            <div class="c-link__under-button__link">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Foggot Password') }}
                                </a>
                            </div>
                            <!-- @endif -->
                            <div class="c-link__under-button__link">
                                <a href="{{ route('register') }}">
                                    {{ __('Signup') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@section('footer')
<footer-component>
</footer-component>
@endsection