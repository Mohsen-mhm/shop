<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome.min.css">
    <style>
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(93, 93, 93, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(126, 126, 126, 0.5);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('css')
</head>
<body dir="rtl" class="bg-dark">
<div id="app">
    @include('layouts.header')

    <main class="py-4 d-flex justify-content-center align-items-center">
        @yield('content')
    </main>

    @include('layouts.footer')
</div>
@yield('script')
</body>
</html>
