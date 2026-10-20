@extends('layout.app')

@section('title', 'Services - Manicure - Pedicure | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Manicure & Pedicure</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="mh-paradisecenter" class="mh-paradisecenter mh-sectionspace mh-haslayout mb-20">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mh-sectionhead mb-50">
                    <div class="mh-sectiontitle">
                        <h2><span>{{ app_name() }}</span>
                            Manicure & Pedicure
                        </h2>
                    </div>
                    <div class="mh-description mb-40 text-center">
                        Our Manicure and Pedicure treatments will leave you feeling relaxed and rejuvenated during your time with us.
                    </div>
                    <div class="mh-headcontent text-left">
                        <div class="col-sm-6 mh-description mh-postdetails">
                            <h2>
                                Nail Recovery
                            </h2>
                            <div style="max-height: 400px; overflow: hidden">
                                <img src="/images/services/gel-nail.gif" class="mh-border img-responsive">
                            </div>
                            <div class="mt-20 col-sm-12">
                                Choose from a variety of polish and gels. We provide below services to keep your nails strong so that they grow long.
                            </div>
                            <div class="mh-post mt-20 col-sm-12">
                                <hr />
                                <h2 class="font-arizonia text-center f-24 no-underline">Services</h2>
                                <ul class="txt-holder list-unstyled mh-pricelist">
                                    <li class="sub-item-service">
                                        <span class="name">Gel Set</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$65.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Gel Fill</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$45.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Gel Overlay</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$45.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Gel Removal</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$25.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Nail Repair</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$10.00+<sup>*</sup>--}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <hr />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mh-description mh-postdetails">
                            <h2>
                                Manicure
                            </h2>
                            <img src="/images/services/manicure.jpeg" class="mh-border img-responsive">
                            <div class="col-sm-12">
                                <hr />
                                <h2 class="font-arizonia text-center f-24 no-underline">Services</h2>
                                <ul class="mh-pricelist">
                                    <li class="sub-item-service">
                                        <span class="name">Manicure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$28.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Spa Manicure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$35.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">French Upgrade</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$10.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Nail Art</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$5.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Shellac Manicure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$38.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Paraffin Wax</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$10.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Regular Polish Change</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$15.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service pb-10">
                                        <span class="name">Shellac Nail Polish Change</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$28.00+<sup>*</sup>--}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mh-headcontent text-left">
                        <div class="col-xs-12 col-sm-6 mh-description mh-postdetails">
                            <h2>
                                Pedicure
                            </h2>
                            <img src="/images/services/pedicure.jpeg" class="mh-border img-responsive">
                            <div class="col-sm-12">
                                <hr />
                                <h2 class="font-arizonia text-center f-24 no-underline">Services</h2>
                                <ul class="mh-pricelist">
                                    <li class="sub-item-service">
                                        <span class="name">Pedicure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$38.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Spa Pedicure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$48.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Shellac Pedicure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$52.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Royal Pedicure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$58.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Toe Cure</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$30.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Regular Polish Change</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$20.00+<sup>*</sup>--}}</span>
                                    </li>
                                    <li class="sub-item-service">
                                        <span class="name">Shellac Polish Change</span>
                                        {{--<span class="border"></span>--}}
                                        <span class="price">{{--$28.00+<sup>*</sup>--}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <hr />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 mh-description mh-postdetails mh-headcontent text-left">
                            <h2>
                                For Children
                            </h2>
                            <img src="/images/services/nail-kids.jpg" class="mh-border img-responsive" style="width: 380px; margin: 0 auto">
                            <div class="mt-20 col-sm-12">
                                Create beautiful memories by bringing your little ones in for a special treat. We offer packages so that they can soak their feet beside you. Childern's pricing includes a design to make their day a special one.
                            </div>
                            <div class="mh-postdetails">
                                <div class="col-sm-12">
                                    <hr />
                                    <h2 class="font-arizonia text-center f-24 no-underline">Services</h2>
                                    <ul class="mh-pricelist mt-20">
                                        <li class="sub-item-service">
                                            <span class="name">Manicure</span>
                                            {{--<span class="border"></span>--}}
                                            <span class="price">{{--$15.00+<sup>*</sup>--}}</span>
                                        </li>
                                        <li class="sub-item-service">
                                            <span class="name">Pedicure</span>
                                            {{--<span class="border"></span>--}}
                                            <span class="price">{{--$25.00+<sup>*</sup>--}}</span>
                                        </li>
                                        <li class="sub-item-service">
                                            <span class="name">Manicure/Pedicure</span>
                                            {{--<span class="border"></span>--}}
                                            <span class="price">{{--$35.00+<sup>*</sup>--}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<small><sup>*</sup><i>Prices subject to change without notice.</i></small>--}}
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
    </div>
</section>
@endsection