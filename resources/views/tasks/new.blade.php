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
                <label for="title">{{ __('Big Task') }}</label>
                <div class="c-form__group">
                    <div>
                        <input id="title" type="text" name="title" value="{{ old('title') }}"
                            placeholder="例:部屋の片付けを終わらせる" autocomplete="title" autofocus>
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
                <label for="">{{ __('Small Task') }}</label>
                @for($i = 1; $i <= 5; $i++) <div class="c-form__group">
                    <label for="task{{$i - 1}}"></label>
                    <ul>
                        <li>
                            <input id="task{{$i - 1}}" type="text" name="task{{$i - 1}}"
                                value="{{old('task'.($i - 1))}}" placeholder="分割タスク{{ $i }}"
                                autocomplete="task{{$i - 1}}" autofocus>
                            @error('task'.($i - 1))
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