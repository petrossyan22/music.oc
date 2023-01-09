<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Favicon-->
    <link rel=icon href="/favicon.png" sizes="16x16" type="image/ico">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/admin.css">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/media.css">

    <!--Font Awesome 4-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include("include.navbar")
        <div id="content_container">
            <div id="content">
                @yield('content')
            </div>
        </div>
        @include("include.sidebar")
    </div>
</body>
</html>
