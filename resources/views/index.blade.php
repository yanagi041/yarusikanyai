@extends('layouts.app')

@section('title','ホーム')

@section('header')
<header-component v-bind:authcheck="@auth true @endauth @guest false @endguest" v-bind:logout="'{{route('logout')}}'">
</header-component>
@endsection

@section('content')
<div class="p-index">

    <div class="p-index__hero">
        <img src="/img/hero.png" alt="hero">
        <p>やらニャきゃいけないことを分割して</p>
        <p>達成していくTodoリスト</p>
    </div>
    <div class="c-double-button-group">
        <div class="c-wrapper-button">
            <a href="{{ route('register') }}">
                <div class="btn-dark">
                    {{ __('Signup') }}
                </div>
            </a>
        </div>
        <div class="c-wrapper-button">
            <a href="{{ route('login') }}">
                <div class="btn-dark">
                    {{ __('Login') }}
                </div>
            </a>
        </div>
    </div>

</div>

@endsection

@section('footer')
<footer-component></footer-component>
@endsection