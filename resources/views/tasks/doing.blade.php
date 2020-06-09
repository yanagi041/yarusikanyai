@extends('layouts.app')

@section('title','タスク作成')

@section('header')
<header-component class="l-header-light" v-bind:authcheck="@auth true @endauth @guest false @endguest"
    v-bind:logout="'{{route('logout')}}'"></header-component>
@endsection

@section('content')
<doing-component v-bind:task="{{$task}}"></doing-component>
@endsection

@section('footer')
<footer-component class="l-footer-light"></footer-component>
@endsection