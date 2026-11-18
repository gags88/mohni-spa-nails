@extends('layout.app')

@php($service = config('service-pages.' . $serviceKey))

@section('title', $service['title'] . ' | ' . app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="{{ $service['intro'] }}">
<meta name="keywords" content="{{ $service['title'] }}, spa services Winnipeg, {{ app_name() }}">
<meta name="author" content="{{ app_name() }}">
@endsection

@section('content')
    @include('pages.services.partials.service-page', ['serviceKey' => $serviceKey])
@endsection
