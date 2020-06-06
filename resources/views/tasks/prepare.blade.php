@extends('layouts.app')

@section('title','タスク確認')

@section('header')
<header-component class="l-header-light"></header-component>
@endsection

@section('content')
<prepare-component v-bind:task="{{$task}}"></prepare-component>
@endsection

@section('footer')
<footer-component class="l-footer-light"></footer-component>
@endsection