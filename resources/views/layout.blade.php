<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HasTuLista | @yield('title', '')</title>

    <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/plantilla/fontawesome-all.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">

    @yield('extra-css')
</head>


<body class="@yield('body-class', '')">

    <div class="super_container">

        <div id="app">
            @include('partials.nav')

            @yield('content')

            @guest(session()->put('previousUrl', url()->current()))
                @include('partials.auth.login')
                @include('partials.auth.register')
            @endguest

        </div>
        @include('partials.footer')

    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/plantilla.js')}}"></script>
    @yield('extra-js')
</body>
</html>
