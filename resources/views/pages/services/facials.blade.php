@extends('layout.app')

@section('title', 'Services - Facials | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Facials</li>
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
                            Facials
                        </h2>
                    </div>
                    <div class="mh-headcontent text-justify mh-post mb-20">
                        <div class="col-sm-6">
                            <img src="/images/services/facials.jpg" class="mh-border img-responsive">
                        </div>
                        <div class="col-sm-6">
                            <div class="mh-description mb-10 pt-20">
                                <strong>We don't expect you to be a skincare expert - that is why we are here!</strong>
                            </div>
                            <div class="mh-description mb-40">
                                We analyze your skin first and ensure the facial that is suited to your skin type including cleansing, exfoliation, extractions (if needed).<br /><br />
                                Our product lines contain creams, serums that can target acne, pigmentation, ageing, sensitivity, dryness, deep wrinkles, sun damage and most other skin conditions.
                            </div>
                        </div>
                    </div>
                    <div class="mh-headcontent text-left mt-20">
                        <div class="col-xs-12 mh-description mh-postdetails">
                            <h2>
                                Basic Facial
                            </h2>
                            <div class="txt-holder"> A basic facial cleanses pores, exfoliates away dead skin cells, and treats common skin concerns with a custom mask. It is meant to rejuvenate faces and pamper clients. Basic facials deeply cleanse skin and may help fight certain skin problems, such as mild acne or dryness. The treatments leave faces glowing and are typically very relaxing.</div>
                            <hr />
                        </div>
                    </div>
                    <div class="mh-headcontent text-left mt-20">
                        <div class="col-xs-12 mh-description mh-postdetails">
                            <h2>
                                Customized Facial
                            </h2>
                            <div class="txt-holder">This facial is a customized result-oriented facial treatment which addresses and targets your specific skin care concerns such as, anti-aging, dry skin, dehydrated skin, rosacea, reactive and sensitive skin, combination, oily, congested, acne skin. This facial will provide a brighter, firmer and more vibrant complexion. Facial includes cleansing, steam, exfoliation, minimal extractions if needed and advanced result-oriented modalities appropriately selected. The advanced modalities selected will depend on what your skin needs at the time of your appointment.</div>
                            <hr />
                        </div>
                    </div>
                    <div class="mh-headcontent text-left mt-20">
                        <div class="col-xs-12 mh-description mh-postdetails">
                            <h2>
                                Back Facial
                            </h2>
                            <div class="txt-holder">A back facial is pretty much exactly what it sounds like — the process of attending to the skin on your back in the same way one would typically attend to their facial skin in a spa setting. Back facials involve a process of cleansing, exfoliating, and moisturizing the skin on the back, in addition to applying a mask. Most back facials also include an extraction process to clear out blocked pores and reduce the severity of any present back acne.</div>
                            <hr />
                        </div>
                    </div>
                    @include('pages.services.hydra-facial')
                    <div class="row">
                        <div class="col-sm-12">
                            <hr />
                        </div>
                    </div>
                    @include('pages.services.microdermabrasion')
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
        <div class="text-left mb-20 hide">
            <hr />
            <div class="col-sm-10 col-sm-offset-1">
                <div class="mb-10 text-center">
                    <h2 class="font-arizonia f-24">Price List</h2>
                </div>
                <div class="row mh-pricelist">
                    <ul class="col-sm-12" style="margin-bottom:0">
                        <li class="sub-item-service">
                            <span class="name">Basic Facial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$50.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Customized Facial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$65.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Back Facial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$90.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Relaxation Facial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$70.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Clarifying(Acne) Facial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$80.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Anti Aging Facial(w/Collagen Treatment)</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$85.00+<sup>*</sup>--}}</span>
                        </li>
                    </ul>
                    <ul class="col-sm-12">
                        <li class="sub-item-service">
                            <span class="name">Microdermabrasion</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$120.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Hydrafacial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$125.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Dermaplanning Facial</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$125.00+<sup>*</sup>--}}</span>
                        </li>
                        <li class="sub-item-service">
                            <span class="name">Microneedling</span>
                            {{--<span class="border"></span>--}}
                            <span class="price">{{--$335.00+<sup>*</sup>--}}</span>
                        </li>
                    </ul>
                </div>
                {{--<small><sup>*</sup><i>Prices subject to change without notice.</i></small>--}}
            </div>
        </div>
    </div>
</section>
@endsection