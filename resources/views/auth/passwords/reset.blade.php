@extends('layouts.app')

@section('title','パスワードリセット')

@section('header')
<header-component></header-component>
@endsection


@section('content')

<div class="password-reset">
    <h2>{{ __('Reset Password') }}</h2>
    <div class="c-form">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address')
                    }}</label>

                <div>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <p class="c-form__error">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password')
                    }}</label>

                <div>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">

                    @error('password')
                    <p class="c-form__error">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
            </div>

            <div class="c-form__group">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password')
                    }}</label>

                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
            </div>

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