@extends('layouts.app')

@section('title','マイページ')

@section('header')
<header-component v-bind:authcheck="@auth true @endauth @guest false @endguest" v-bind:logout="'{{route('logout')}}'"
    v-bind:user="{{$user}}"></header-component>
@endsection

@section('content')
<div class="p-tasks-mypage">
    <h2>今日やること</h2>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @if ($tasks->isEmpty())
    <div class="p-tasks-mypage__notask">
        <img src="/img/nodata.png" alt="nodata">
        <p>登録中のタスクはありません</p>
    </div>
    @endif

    <!-- タスクリスト -->
    <div class="c-task-list">
        <ul>
            @foreach($tasks as $task)

            <li class="c-task-list__item">
                <a href="{{ route('tasks.prepare', $task -> id) }}">
                    <p> <i class="fas fa-paw"></i>
                        {{ $task -> title }}
                    </p>
                </a>

                <div class="c-task-list__item-group">
                    <form action="{{ route('tasks.edit', $task->id ) }}" method="get">
                        @csrf
                        <button type="submit"> <i class="fas fa-edit"></i>
                        </button>
                    </form>
                    <form action="{{ route('tasks.delete',$task->id ) }}" method="post">
                        @csrf
                        <button type="submit" onclick='return confirm("削除しますか？");'><i
                                class="fas fa-trash-alt"></i></button>
                    </form>
                </div>

            </li> @endforeach
        </ul>
    </div>

    <div class="c-double-button-group">
        <div class="c-wrapper-button">
            <a href="{{ route('tasks.new') }}">
                <div class="btn-dark">
                    {{ __('Make') }}
                </div>
            </a>
        </div>
        <div class="c-wrapper-button">
            <a href="{{ route('tasks.history') }}">
                <div class="btn-dark">
                    {{ __('History') }}
                </div>
            </a>
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