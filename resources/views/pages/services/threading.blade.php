@extends('layout.app')

@section('title', 'Services - Threading | ' .app_name() . ' in Winnipeg, Manitoba')
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
                    <hr />
                    <h2 class="font-arizonia f-24 text-center">Services</h2>
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
                    <ul class="txt-holder list-unstyled mt-10 mh-pricelist col-sm-12 hide">
                        <li class="sub-item-service">
                            <span class="name">Eyebrows</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$9.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Eyebrows & Lip</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$12.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Chin</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$7.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Forehead</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$5.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Full face</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$28.00+<sup>*</sup>--}}</span>
                        </li>
                    </ul>
                </div>
                {{--<small><sup>*</sup><i>Prices subject to change without notice.</i></small>--}}
            </div>
        </div>
    </div>
</section>
@endsection