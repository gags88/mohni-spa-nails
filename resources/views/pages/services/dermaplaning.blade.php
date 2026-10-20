@extends('layout.app')

@section('title', 'Services - Dermaplaning | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Dermaplaning </li>
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
                            Dermaplaning
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mh-headcontent text-left">
            <div class="col-sm-6">
                <img src="/images/services/dermaplaning.jpg" class="mh-border img-responsive mb-20">
            </div>
            <div class="col-sm-6 mh-description mh-postdetails">
                <div class="mb-20 txt-holder">
                    <div class="mb-20">Dermaplaning is a skin treatment that uses an exfoliating blade to skim dead skin cells and hair from your face.</div>
                    <div>Dermaplaning aims to make your skin's surface smooth, youthful, and radiant. This treatment claims to remove deep scarring from acne and uneven pockmarks on your skin. It's also used to remove "peach fuzz," the short, soft hairs on your face.</div>
                    <div class="mt-20">
                        Dermaplaning can be used for any skin type and anyone with:
                    </div>
                    <div class="mh-post">
                        <ul class="txt-holder list-unstyled mt-10 mh-treatmentlist">
                            <li>Acne scars.</li>
                            <li>Dull skin.</li>
                            <li>Dry skin.</li>
                            <li>Sun-damaged skin.</li>
                            <li>Fine wrinkles.</li>
                        </ul>
                    </div>
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
                    <h2 class="font-arizonia text-center f-24 no-underline">Price List</h2>
                    <ul class="mh-pricelist">
                        <li class="sub-item-service">
                            <span class="name">Dermaplanning</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$75.00+--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Dermaplanning Facial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--<b>$125.00+</b>--}}</span>
                        </li>
                    </ul>
                    <small><sup>*</sup><i>Prices subject to change without notice.</i></small>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection