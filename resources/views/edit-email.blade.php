@extends('layouts.app')

@section('title','メールアドレス変更')

@section('header')
<header-component v-bind:authcheck="@auth true @endauth @guest false @endguest" v-bind:logout="'{{route('logout')}}'">
</header-component>
@endsection

@section('content')

<div class="p-register">

    <h2>{{ __('Change Email') }}</h2>
    <div class="c-form">
        <form method="POST" action="{{ route('change-email') }}">
            @csrf

            <div class="c-form__group">
                <label for="email">{{ __('E-Mail Address')
                    }}</label>
                <div>
                    <input id="email" type="email" placeholder="メールアドレス" name="email" value="{{ $user['email'] }}"
                        required autocomplete="email" autofocus>

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

        </form>


    </div>

</div>
</div>
@endsection

@section('footer')
<footer-component></footer-component>
@endsection