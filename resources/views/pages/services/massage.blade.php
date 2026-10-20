@extends('layout.app')

@section('title', 'Services - Massage | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Massage</li>
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
                            Massage
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mh-headcontent text-left">
            <div class="col-sm-12 mh-description mh-postdetails">
                <div class="mb-20">
                    Reduce muscle tension, find relief from chronic pain, or just look for a moment of relaxation. Massage therapy will overall enhance senses of emotional and physical well-being.
                </div>
                <hr />
            </div>
        </div>
        <div class="row mh-headcontent">
            <div class="col-sm-4">
                <h2 class="center">
                    Hot Stone Massage
                </h2>
                <img src="/images/services/hot_stone_massage.jpeg" class="mh-border mb-20" />
                <ul class="mh-pricelist">
                    <li class="sub-item-service">
                        <span class="name">30 minutes</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--$45.00+<sup>*</sup>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">60 minutes</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--$65.00+<sup>*</sup>--}}</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h2 class="center">
                    Relaxation Massage
                </h2>
                <img src="/images/services/relaxing_massage.jpeg" class="mh-border mb-20" />
                <ul class="mh-pricelist">
                    <li class="sub-item-service">
                        <span class="name">30 minutes</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--$35.00+<sup>*</sup>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">60 minutes</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--$55.00+<sup>*</sup>--}}</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h2 class="center">
                    Ear Candling
                </h2>
                <img src="/images/services/ear_candling.jpeg" class="mh-border mb-20" />
                <ul class="mh-pricelist">
                    <li class="sub-item-service">
                        <span class="name">Ear candling</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--$38.00+<sup>*</sup>--}}</span>
                    </li>
                </ul>
            </div>
        </div>
        {{--<small><sup>*</sup><i>Prices subject to change without notice.</i></small>--}}
    </div>
</section>
@endsection