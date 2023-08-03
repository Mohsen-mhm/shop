<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome.min.css">

    <link href="/plugins/admin/css/admin.min.css" rel="stylesheet">

</head>

<body id="page-top" style="background: #1e2125">

@include('admin.layouts.header')

<div class="container-fluid text-right" dir="rtl">
    @yield('content')
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/plugins/jquery-easing/jquery.easing.min.js"></script>

<script src="/plugins/admin/js/admin.min.js"></script>

</body>

</html>
