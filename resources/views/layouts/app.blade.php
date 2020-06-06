<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Home') | やるしかニャい</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app" class="wrapper--main">
        <!-- header-component -->
        @yield('header')
        <!-- header-component end -->
        <div class="l-main">
            <div class="l-main__inner">
                <div class="l-main__base">
                    <!-- content -->
                    @yield('content')
                    <!-- content end -->
                </div>
            </div>
        </div>
        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
        <div class="c-flash" v-bind:class="{'is-active': isActive}" role="alert">
            {{ session('flash_message') }}
        </div>
        @endif

        <!-- フラッシュメッセージ end -->
        @yield('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>