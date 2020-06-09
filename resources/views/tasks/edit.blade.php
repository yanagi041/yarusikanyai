@extends('layouts.app')

@section('title','タスク編集')

@section('header')
<header-component class="l-header-light" v-bind:authcheck="@auth true @endauth @guest false @endguest"
    v-bind:logout="'{{route('logout')}}'"></header-component>
@endsection

@section('content')
<div class="p-tasks-new">
    <h2>タスク編集</h2>
    <div class="c-form">
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf

            <!-- 大タスク -->
            <div class="p-single-task">
                <label for="title">{{ __('Big Task') }}</label>
                <div class="c-form__group">
                    <div>
                        <input id="title" type="text" name="title" value="{{$task->title}}" placeholder="例:部屋の片付けを終わらせる"
                            autocomplete="title" autofocus>

                        @error('title')
                        <p class="c-form__error">
                            <strong>{{ $message }}</strong>
                        </p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- 大タスク end -->

            <!-- 小タスク -->
            <div class="c-task-list">
                @for($i = 1; $i <= 5; $i++) <div class="c-form__group">
                    <label for="task{{$i - 1}}">{{ __('Small Task') }}</label>

                    <ul>
                        <li>
                            <input id="task{{$i - 1}}" type="text" name="task{{$i - 1}}"
                                value=" {{ $task['task'.($i - 1)] }} "
                                placeholder="例:片付ける部屋を決める/片付ける場所を決める/ゴミ袋を持ってくる..." autocomplete="task{{$i - 1}}"
                                autofocus>

                            @error('task')
                            <p class="c-form__error">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </li>
                    </ul>
            </div>
            @endfor
    </div>
    <!-- 小タスク end -->

    <div class="c-form__group">
        <div class="c-single-button-group">
            <button type="submit" class="btn-light">{{ __('Register') }}</button>
        </div>
    </div>

    </form>

</div>


</div>
@endsection

@section('footer')
<footer-component class="l-footer-light"></footer-component>
@endsection