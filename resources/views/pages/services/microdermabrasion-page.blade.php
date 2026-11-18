@extends('layout.app')

@section('title', 'Microdermabrasion Facial | ' . app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Diamond microdermabrasion facial treatment at Mohni Nail and Spa in Winnipeg.">
<meta name="keywords" content="microdermabrasion Winnipeg, diamond facial, facial exfoliation">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection

@section('content')
@include('pages.services.partials.editorial-hero', ['serviceKey' => 'microdermabrasion'])
<div id="mh-innerbanner" class="mh-innerbanner mh-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mh-innerbanner-area">
                    <div class="mh-bannarheading"><h1>Microdermabrasion</h1></div>
                    <ul class="list-unstyled mh-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Microdermabrasion</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="mh-paradisecenter mh-sectionspace mh-haslayout mb-20 service">
    <div class="container">
        @include('pages.services.partials.treatment-menu', [
            'menuKey' => 'facials',
            'menuIdSuffix' => 'microdermabrasion',
            'menuTitle' => 'Microdermabrasion pricing',
            'menuIntro' => 'A diamond-tip exfoliation facial designed to reveal a smoother, brighter-looking surface.',
            'only' => ['Diamond Microdermabrasion Facial'],
        ])

        @include('pages.services.microdermabrasion')

    </div>
</section>
@endsection
