@extends('layout.app')

@section('title', 'Services - Tinting | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <hr />
                        <h2 class="font-arizonia f-24">Services</h2>
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
                    <div class="row hide">
                        <div class="col-sm-12">
                            <div class="mh-description mh-postdetails text-left">
                                <ul class="txt-holder list-unstyled mt-10 mh-pricelist">
                                    <li class="sub-item-service">
                                        <span class="name">Eyebrow Tinting</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$18.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Eyelash Tinting</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$25.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Eyebrow &amp; Eyelash Tinting</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$35.00+<sup>*</sup>--}}</span>
                                    </li>
                                </ul>
                            </div>
                            {{--<div class="text-left">
                                <small><sup>*</sup><i>Prices subject to change without notice.</i></small>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection