@extends('layouts.app')

@section('title','タスク作成')

@section('header')
<header-component class="l-header-light" v-bind:authcheck="@auth true @endauth @guest false @endguest"
    v-bind:logout="'{{route('logout')}}'"></header-component>
@endsection

@section('content')
<div class="p-tasks-history">
    <h2>達成したこと</h2>
    <div class="p-tasks-history__lists">

        <!-- タスクリスト -->
        <div class="c-task-list">
            <ul>
                @foreach($tasks as $task)

                <li class="c-task-list__item">
                    <p> <i class="fas fa-paw"></i>
                        {{ $task -> title }}
                    </p>

                </li> @endforeach
            </ul>
        </div>
        <!-- タスクリストend -->
    </div>

    <!-- ページネーションここから -->
    {{ $tasks->links() }}
    <!-- ページネーションここまで -->

    <div class="p-tasks-history__achievement">
        <h3>達成件数</h3>

        <div class="p-tasks-history__achievement-item">
            <div class="achievement-item">
                <img src="/img/kanzume.png" alt="kanzume">×{{ $totalBigtask }}
                <p>達成したこと</p>
            </div>
            <div class="achievement-item">
                <img src="/img/karikari.png" alt="karikari">×{{ $totalSmalltask }}
                <p>(分割した)タスク</p>

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer-component class="l-footer-light"></footer-component>
@endsection