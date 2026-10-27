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
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,800,700,600' rel='stylesheet' type='text/css'>
    <link href="/css/app.css?v=1.0138" rel="stylesheet">
    <link href="/css/interior-palette.css?v=2.4" rel="stylesheet">
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
</body>

</html>
