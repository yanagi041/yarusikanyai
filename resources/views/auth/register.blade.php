@extends('layouts.app')

@section('header')
<header-component></header-component>
@endsection

@section('content')
<div class="p-register">

    <h2>{{ __('register') }}</h2>
    <div class="c-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="c-form__group">
                <label for="email">{{ __('E-Mail Address')
                    }}</label>
                <div>
                    <input id="email" type="email" placeholder="メールアドレス"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="c-form__group">
                <div class="form-check">
                    <label class="form-check-label" for="show-password">

                        <input type="checkbox" name="show-password" id="show-password" {{ old('show-password')
                            ? 'checked' : '' }}>
                        <span>{{ __('パスワードを表示') }}</span>
                    </label>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                    Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
            </div> -->

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
<footer-component></footer-component>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    //パスワード表示
    $(function() {
        var pw = document.getElementById('password');
        var pwCheck = document.getElementById('show-password');
        pwCheck.addEventListener('change', function() {
            if (pwCheck.checked) {
                pw.setAttribute('type', 'text');
            } else {
                pw.setAttribute('type', 'password');
            }
        }, false);
    });
</script>