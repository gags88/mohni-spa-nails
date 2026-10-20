@extends('layout.app')

@section('title', 'Services - Waxing | ' .app_name() . ' in Winnipeg, Manitoba')
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
        <div class="row">
            <div class="col-sm-12">
                <hr />
                <div class="mt-20 mb-10 text-center">
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
                <div class="inline-pricelist hide">
                    <ul class="txt-holder list-unstyled mh-pricelist col-sm-6">
                        <li class="sub-item-service">
                            <span class="name">Eyebrow Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$15.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Lip Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$10.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Eyebrow & lip</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$25.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Chin Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$10.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Facial Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$30.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Bikini Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$25.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Brazilian Wax(Female)</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$45.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Stomach Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$30.00+<sup>*</sup>--}}</span>
                        </li>
                    </ul>
                    <ul class="txt-holder list-unstyled mh-pricelist col-sm-6">
                        <li class="sub-item-service">
                            <span class="name">Full Legs Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$45.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Lower Legs Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$28.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Upper Legs Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$30.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Full Arms Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$30.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Half Arms Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$20.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Under Arms Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$15.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Chest/Back Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$45.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Full Body Wax</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$160.00+<sup>*</sup>--}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            {{--<div class="col-sm-12"><small><sup>*</sup><i>Prices subject to change without notice.</i></small></div>--}}
        </div>
    </div>
</section>
@endsection