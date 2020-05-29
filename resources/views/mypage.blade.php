@extends('layouts.app')

@section('title','マイページ')

@section('header')
<header-component></header-component>
@endsection

@section('content')
<div class="p-mypage">
    <h2>今日やること</h2>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <p style="padding: 10px 15px 0px;"> ここにタスクを表示。ボタン形式にする？</p>
    <div class="c-double-button-group">
        <div class="c-wrapper-button">
            <button class="btn-dark">
                <a href="{{ route('tasks.new') }}">{{ __('Make') }}</a>
            </button>
        </div>
        <div class="c-wrapper-button">
            <button class="btn-dark">
                <a href="{{ route('tasks.history') }}">{{ __('History') }}</a>
            </button>
        </div>
    </div>
    <div class="c-link__under-button">
        <a href="{{ route('profile') }}">プロフィール編集</a>
    </div>
</div>
@endsection

@section('footer')
<footer-component></footer-component>
@endsection