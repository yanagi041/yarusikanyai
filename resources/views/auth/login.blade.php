@extends('layouts.app')

@section('title','ログイン')

@section('content')

<div class="p-login">

    <h2>{{ __('Login') }}</h2>
    <div class="c-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="c-form-group">
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

            <div class="c-form-group">
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

            <div class="c-form-group">
                <div>
                    <div class="form-check">
                        <label class="form-check-label" for="remember">

                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>{{ __('ログイン情報を記憶') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="c-form-group">
                <div class="c-single-button-group">
                    <div>
                        <button type="submit" class="btn-login">
                            {{ __('Login') }}
                        </button>
                        <div class="p-login__link">
                            @if (Route::has('password.request'))
                            <a class="btn-link" href="{{ route('password.request') }}">
                                {{ __('パスワードをお忘れの方') }}
                            </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>
@endsection