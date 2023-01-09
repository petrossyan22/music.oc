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
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="stylesheet" href="/css/watch.css">
    <link rel="stylesheet" href="/css/classes.css">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="/css/home.css">

    <!--Font Awesome 4-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include("include.navbar")

        <div id="{{Request::path() == '/' ? 'index_file_content_container' : 'content_container'}}">
            <div id="content">
                @yield('content')
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <ul>
                <li>
                    <a class="navbar_link nav-link" href="/admin">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Admin Panel
                    </a>
                </li>

                <li>
                    <a class="navbar_link nav-link" href="/about">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        About Website
                    </a>
                </li>
                <li>
                    <a class="navbar_link nav-link" href="/api">
                        --Qndzx API--
                    </a>
                </li>
            </ul>
            <p class="nav-link"> &copy;2022 <a href="#">Arshak Petrosyan</a> </p>
        </div>
    </footer>
</body>
</html>
