@extends('layout.app')

@section('title', 'Services - Microneedling | ' .app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Mohni Nails Spa">
<meta name="keywords" content="Nails Spa">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection
@section('content')
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
                        <li>Microneedling</li>
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
                            Microneedling
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mh-headcontent text-left mb-10">
            <div class="col-sm-6">
                <img src="/images/services/micro-needling.jpg" class="mh-border img-responsive mb-20">
            </div>
            <div class="col-sm-6 mh-description">
                <div class="mb-20 txt-holder">
                    <div class="mb-20">Microneedling is a minimally invasive cosmetic procedure that's used to treat skin concerns by stimulating collagen production.</div>
                    <div>Also known as collagen induction therapy that uses a pen-like device to create safe, minuscule micro-punctures in the skin. We use the <strong>eDermaStamp device</strong> that employs the optimal number of needles to maximize effectiveness, safety and comfort.</div>
                    <div class="mt-20 fw500">
                        <b>How does microneedling work?</b>
                    </div>
                    <div>Microneedling works by encouraging your skin to make more collagen. The pinpricks from the procedure cause slight injury to the skin and the skin responds by making new collagen-rich tissue.</div>
                </div>
            </div>
        </div>
        <div class="row mt-20 text-left mh-postdetails">
            <div class="col-sm-12">
                <hr />
                <h4>Benefits</h4>
                <div class="mh-post col-sm-7">
                    <ul class="txt-holder list-unstyled mh-treatmentlist">
                        <li>Improves fine lines & wrinkles.</li>
                        <li>Treats uneven skin tone.</li>
                        <li>Firms & tightens skin. </li>
                        <li>Scar reduction. </li>
                        <li>Helps reduce appearance of stretch marks. </li>
                        <li>Reduces enlarged / visible pores. </li>
                        <li>Helps skin products penetrate and be more effective. </li>
                    </ul>
                </div>
                <div class="col-sm-5">
                    <img src="/images/services/micro-needling-benfits.jpg" class="mh-border img-responsive mw-60">
                </div>
            </div>
        </div>
        <div class="mt-40 text-left mh-postdetails mb-40">
            <div class="col-sm-12">
                <hr />
                <h4>After Microneedling:</h4>
                <div class="mh-post">
                    <ul class="txt-holder list-unstyled mt-10 mh-treatmentlist">
                        <li>After your treatment, your skin may look sunburned for 48-72 hours. </li>
                        <li>You can use mineral makeup within 24 hours.</li>
                        <li>Only use physical sunscreen after 48 hours of treatment.</li>
                        <li>No facial or waxing for 7-14 days before and after treatment.</li>
                        <li>No shaving the treated area for 5 days.</li>
                        <li>No new Botox or Derma fillers for 4 weeks.</li>
                        <li>No laser treatments for 4 weeks.</li>
                        <li>No excessive heat for 5-7 days including heavy workouts, sauna, steam rooms, swimming pool etc.</li>
                    </ul>
                </div>
                <h4>It is recommended to wait 4-6 weeks between microneedling treatments.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <a href="https://book.squareup.com/appointments/shyx8cf9hexrvs/location/LDNGWM2MCEDEJ/services" class="mh-btn">Book now</a>
            </div>
        </div>
        <div class="mh-pricinglist-areas hide">
            <div class="col-sm-6 col-sm-offset-3">
                <hr />
                <h2 class="font-arizonia text-center f-24">Price List</h2>
                <ul class="mh-pricelist">
                    <li class="sub-item-service">
                        <span class="name">Per Treatment</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--$335.00+--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Package of 3 treatments</span>
                        {{--<span class="border"></span>--}}
                        <span class="price font-arizonia f-24">{{--<b>20% off</b>--}}</span>
                    </li>
                </ul>
            </div>
        </div>
        {{--<div class="col-sm-12 video-container mt-20">
            <iframe width="560" height="200" src="https://www.youtube.com/embed/-1qknc3BdPM?controls=0&rel=0&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>--}}
    </div>
</section>
@endsection