@extends('layout.app')

@section('title', 'Services - Makeup | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Makeup</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="mh-paradisecenter" class="mh-paradisecenter mh-sectionspace mh-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mh-sectionhead">
                    <div class="mh-sectiontitle">
                        <h2><span>{{ app_name() }}</span>
                            Makeup
                        </h2>
                    </div>
                    <div class="gallery-area text-center">
                        <div class="mh-portfolio-content mh-haslayout row">
                            <div class="col-sm-12">
                                <div class="mh-project">
                                    <img src="/images/services/makeup_grid1.jpeg" class="mh-border mb-20">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mh-description mb-40 text-center">
                        Let your true beauty shine for all the world to see! <h4 class="text-center">See in store for details</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hide">
            <div class="col-sm-6 col-sm-offset-3">
                <ul class="mh-treatmentlist mb-20">
                    <li class="sub-item-service">
                        <span class="name">Makeup Application</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--$55.00+--}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection