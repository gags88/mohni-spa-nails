<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    @yield('website_meta')
    <!-- Google Web fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="/css/app.css?v=1.0138" rel="stylesheet">
    <link href="/css/interior-palette.css?v=3.6" rel="stylesheet">
</head>

<body class="mh-home mh-homeone">
    <div id="mh-wrapper" class="mh-wrapper mh-haslayout">
        @include('includes.nav')
        @yield('content')
        @include('includes.footer')
        <span id="back-top" class="text-center rounded-circle fa fa-angle-up"></span>
        <!-- <div id="loader" class="loader-holder">
            <div class="block">
                <div class="dot white"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div> -->
    </div>
    <script type="text/javascript" src="/js/app.js?v=0.005"></script>
    @yield('page_scripts')
</body>

</html>
