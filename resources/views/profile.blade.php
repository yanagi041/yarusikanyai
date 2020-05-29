@extends('layouts.app')

@section('title','ユーザー情報変更')

@section('header')
<header-component></header-component>
@endsection

@section('content')
<div class="p-profile">
    <h2>ユーザー情報変更</h2>
    <div class="p-profile-links">
        <div class="c-link__under-button">
            <a href="{{ route('edit-email') }}">メールアドレス変更</a>
        </div>
        <div class="c-link__under-button">
            <a href="{{ route('edit-pass') }}">パスワード変更</a>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer-component></footer-component>
@endsection