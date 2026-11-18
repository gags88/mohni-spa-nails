@extends('layout.app')

@section('title', 'Services - Waxing | ' .app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Mohni Nails Spa">
<meta name="keywords" content="Nails Spa">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection
@section('content')
@include('pages.services.partials.editorial-hero', ['serviceKey' => 'waxing'])
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
                        <li>Waxing</li>
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
                            Waxing
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="mh-headcontent text-left">
            <div class="col-sm-5">
                <img src="/images/services/waxing.JPG" class="mh-border img-responsive mb-20">
            </div>
            <div class="col-sm-7 mh-description mh-postdetails">
                <div class="mb-20">
                    Waxing is one of the most effective way to get your skin smooth and soft, when removal hair is part of your regular beauty routine or for any special occasion, we are your trusted place to go.
                    <div class="mt-10">Please allow a minimum of 1/4" hair growth for all waxing appointments. Clients using Retinol and Accutane should avoid waxing.</div>
                </div>
            </div>
        </div>
        @include('pages.services.partials.treatment-menu', ['menuKey' => 'waxing'])
    </div>
</section>
@endsection
