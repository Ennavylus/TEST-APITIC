<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('extra-meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'WowCRUD') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('extra-script')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('character.index') }}">
            <img src="{{ asset('image/logWow.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Wow CRUD
        </a>
    </nav>

    <main class='container'>
        <div id="app"></div>
        @include('layouts.alerts')
        @yield('content')
    </main>

    @yield('extra-js')
</body>

</html>
