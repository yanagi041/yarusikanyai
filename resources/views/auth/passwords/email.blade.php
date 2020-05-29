@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div>
            <div>
                <div>
                    <h2>{{ __('Reset Password') }}</h2>
                </div>

                <div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="c-form">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="c-form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="c-form-group">
                                <div class="c-single-button-group">
                                    <button type="submit" class="c-btn-dark">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection