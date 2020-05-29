@extends('layouts.app')

@section('title','タスク作成')

@section('header')
<header-component class="l-header-light"></header-component>
@endsection

@section('content')
<div class="p-tasks-new">
    <h2>タスク作成</h2>
    <div class="c-form">
        <form method="POST" action="{{ route('tasks.new') }}">
            @csrf

            <!-- 大タスク -->
            <div class="p-single-task">
                <label for="big-task">{{ __('Big Task') }}</label>
                <div class="c-form-group">
                    <div class="">
                        <input id="big-task" type="text" name="big-task" value="{{ old('big-task') }}"
                            placeholder="例:部屋の片付けを終わらせる" autocomplete="big-task" autofocus>
                        @error('big-task')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- 大タスク end -->

            <!-- 小タスク -->
            <div class="c-task-list">
                <label for="small-task">{{ __('Small Task') }}</label>
                @for($i = 1; $i <= 5; $i++) <div class="c-form-group">
                    <div class="">
                        <input id="big-task" type="text" name="big-task" value="{{ old('big-task') }}"
                            placeholder="例:片付ける部屋を決める/片付ける場所を決める/ゴミ袋を持ってくる..." autocomplete="big-task" autofocus>
                        @error('small-task')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            @endfor
    </div>
    <!-- 小タスク end -->

    <div class="c-form-group">
        <div class="c-single-button-group">
            <button type="submit" class="btn-light">{{ __('Register') }}</button>
        </div>
    </div>

</div>


</div>
@endsection

@section('footer')
<footer-component class="l-footer-light"></footer-component>
@endsection