@extends('layout.app')

@section('title', 'Services - Nail Recovery | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Nail Recovery</li>
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
                            Nail Recovery
                        </h2>
                    </div>
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
        <div class="row mh-headcontent text-left hide">
            <div class="col-sm-7"><img src="/images/services/nail-recovery.jpg" class="mh-border" /></div>
            <div class="col-sm-5 mh-description mh-postdetails">
                <div class="mb-20">
                    Choose from a variety of polish and gels. We provide below services to keep your nails strong so that they grow long:
                    <div class="mh-post row">
                        <ul class="txt-holder list-unstyled mt-10 mh-treatmentlist col-sm-11 col-sm-offset-1">
                            <li class="sub-item-service">
                                <span class="name">Gel Set</span>
                                {{--<span class="border"></span>--}}
                                <span class="price">{{--$65.00+--}}</span>
                            </li>
                            <li class="sub-item-service">
                                <span class="name">Gel Fill</span>
                                {{--<span class="border"></span>--}}
                                <span class="price">{{--$45.00+--}}</span>
                            </li>
                            <li class="sub-item-service">
                                <span class="name">Gel Overlay</span>
                                {{--<span class="border"></span>--}}
                                <span class="price">{{--$45.00+--}}</span>
                            </li>
                            <li class="sub-item-service">
                                <span class="name">Gel Removal</span>
                                {{--<span class="border"></span>--}}
                                <span class="price">{{--$25.00+--}}</span>
                            </li>
                            <li class="sub-item-service">
                                <span class="name">Nail Repair</span>
                                {{--<span class="border"></span>--}}
                                <span class="price">{{--$10.00+--}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
