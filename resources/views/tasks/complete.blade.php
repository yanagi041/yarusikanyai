@extends('layouts.app')

@section('title','タスク作成')

@section('header')
<header-component class="l-header-light" v-bind:authcheck="@auth true @endauth @guest false @endguest"
    v-bind:logout="'{{route('logout')}}'" ></header-component>
@endsection


@section('content')
<div class="p-tasks-complete">
    <h2>タスク完了！</h2>
    <div class="p-tasks-complete__img">
        <img src="/img/happycat.png" alt="cat">
    </div>
    <div class="c-single-button-group">
        <div class="c-wrapper-button">
            <a href="{{ route('mypage') }}">
                <div class="btn-light">
                    マイページ
                </div>
            </a>
        </div>
    </div>
</div>

@endsection

@section('footer')
<footer-component class="l-footer-light"></footer-component>
@endsection