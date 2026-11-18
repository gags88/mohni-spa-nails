@extends('layout.app')

@section('title', 'Services - Tinting | ' .app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Mohni Nails Spa">
<meta name="keywords" content="Nails Spa">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection
@section('content')
@include('pages.services.partials.editorial-hero', ['serviceKey' => 'tinting'])
<div id="mh-innerbanner" class="mh-innerbanner mh-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mh-innerbanner-area">
                    <div class="mh-bannarheading">
                        <h1>Services</h1>
                    </div>
                    <ul class="list-unstyled mh-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Tinting </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="mh-paradisecenter" class="mh-paradisecenter mh-sectionspace mh-haslayout mb-20 service">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mh-sectionhead mh-postdetails">
                    <div class="mh-sectiontitle">
                        <h2><span>{{ app_name() }}</span>
                            Tinting
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-left">
            <div class="row">
                <div class="col-sm-6">
                    <img src="/images/services/tinting.jpg" class="mh-border img-responsive mb-20">
                </div>
                <div class="col-sm-6 text-center">
                    <div class="text-center">
                        Tinting is a process to boost the natural colour of your brows and lashes by using vegetable-based semi permanent dye.
                    </div>
                </div>
            </div>
        </div>
        @include('pages.services.partials.treatment-menu', ['menuKey' => 'tinting'])
    </div>
</section>
@endsection
