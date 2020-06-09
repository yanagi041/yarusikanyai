@extends('layouts.app')

@section('title','パスワードリセット')

@section('header')
<header-component></header-component>
@endsection


@section('content')
<div class="container">
    <div>
        <div>
            <div>
                <div>
                    <h2>{{ __('Reset Password') }}</h2>
                </div>

                <div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="c-form">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="c-form__group">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                    <p class="c-form__error">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                    @enderror
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer-component></footer-component>
@endsection