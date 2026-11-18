@extends('layout.app')

@section('title', 'Nail Services | ' . app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Manicures, pedicures, gel nails, nail add-ons and children’s nail services at Mohni Nail and Spa in Winnipeg.">
<meta name="keywords" content="manicure, pedicure, gel nails, nail salon Winnipeg">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection

@section('content')
@include('pages.services.partials.editorial-hero', ['serviceKey' => 'nails'])
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
                        <li>Nail Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="mh-paradisecenter" class="mh-paradisecenter mh-sectionspace mh-haslayout mb-20 service">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mh-sectionhead">
                    <div class="mh-sectiontitle">
                        <h2><span>{{ app_name() }}</span>Nail Services</h2>
                    </div>
                    <div class="mh-description mb-40 text-center mohni-service-intro-copy">
                        From beautifully maintained natural nails to gel enhancements and restorative care, every appointment is shaped around lasting comfort and a polished finish.
                    </div>
                </div>
            </div>
        </div>

        @include('pages.services.partials.treatment-menu', ['menuKey' => 'nails'])
    </div>
</section>
@endsection
