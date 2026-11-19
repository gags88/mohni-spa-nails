<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    @yield('website_meta')
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="/css/app.css?v=1.0138" rel="stylesheet">
    <link href="/css/interior-palette.css?v=4.9" rel="stylesheet">
</head>
<body class="mohni-booking-page">
    <header class="mohni-booking-nav">
        <a class="mohni-booking-nav__brand" href="{{ route('home.show', [], false) }}">Mohni Spa &amp; Nails Inc.</a>
        <div class="mohni-booking-nav__meta">
            <span>Private appointment booking</span>
            <a href="{{ route('home.show', [], false) }}">Exit</a>
        </div>
    </header>
    @yield('content')
    @yield('page_scripts')
</body>
</html>
