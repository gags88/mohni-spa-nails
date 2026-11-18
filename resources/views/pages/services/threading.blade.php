@extends('layout.app')

@section('title', 'Services - Threading | ' .app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Mohni Nails Spa">
<meta name="keywords" content="Nails Spa">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection
@section('content')
@include('pages.services.partials.editorial-hero', ['serviceKey' => 'threading'])
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
                        <li>Threading</li>
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
                            Threading
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-left">
            <div class="col-sm-7"><img src="/images/services/threading.JPG" class="mh-border mb-20" /></div>
            <div class="col-sm-5">
                <div class="mb-20">
                    Ideal for any skin type, this ancient form of hair removal uses 100% cotton thread twisted and rolled over the hair to remove it from the root.
                </div>
            </div>
        </div>
        @include('pages.services.partials.treatment-menu', ['menuKey' => 'threading'])
    </div>
</section>
@endsection
