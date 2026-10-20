@extends('layout.app')

@section('title', 'Services - Sugaring | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Sugaring</li>
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
                            Sugaring
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="mh-headcontent text-left">
            <div class="col-sm-6">
                <img src="/images/services/sugaring_img.jpg" class="mh-border img-responsive mb-20">
            </div>
            <div class="col-sm-6 mh-description mh-postdetails">
                <div class="mb-20 txt-holder">
                    <div class="mb-20">Sugaring, an ancient method, is another way to remove unwanted hair. It became more
                        popular in recent years with many salons offering sugaring. Most sugaring products contain
                        sugar, lemon and water or similar ingredients, it is safe and much gentler form of hair removal;
                        it is perfect for sensitive skin ad safe on psoriasis and varicose veins.</div>
                    <div class="mt-20">
                        In addition to a softer, hair-free appearance, sugaring offers other benefits:
                    </div>
                    <div class="mh-post">
                        <ul class="txt-holder list-unstyled mt-10 mh-treatmentlist">
                            <li>Helps reduce the risk of ingrown hairs</li>
                            <li>Gently exfoliates while improving the appearance of skin tone and texture</li>
                            <li>Suitable for all skin types, including sensitive</li>
                            <li>Sugar paste is all-natural and hypoallergenic</li>
                            <li>Results last up to 4 weeks and if performed regularly, can lead to permanency</li>
                            <li>Hair only needs to be 1/4th inch long to be sugared</li>
                            <li>The mixture is water-soluble, so it washes off with water if any residue is left behind</li>
                            <li>Sugaring is eco-friendly and cost efficient. It requires no strips, popsicles sticks for
                                applying or any other waste that is necessary for conventional waxing procedures</li>
                        </ul>
                    </div>
                </div>
                {{--<div class="col-sm-12 hide">
                    <hr />
                    <p><b>Price:</b> $475.00+<sup>*</sup></p>
                    <small><sup>*</sup><i>Prices subject to change without notice.</i></small>
                    <hr />
                </div>--}}
            </div>
        </div>
        <div class="text-left">
            <div class="mh-description mh-postdetails">
                <div class="mb-20 txt-holder">
                    <hr/>
                    <h2 class="col-sm-12 f-24">Before &amp; After Body Sugaring</h2>
                    <div class="col-sm-6 mh-post mt-20">
                        <b>Before:</b>
                        <ul class="txt-holder list-unstyled mt-10 mh-treatmentlist">
                            <li>Prior to Sugaring, no body creams, lotions or deodorant should be applied to the skin as
                                this can hinder the Sugar from adhering to the hair.</li>
                            <li>Broken, sunburnt, damaged skin should be avoided.</li>
                            <li>You may choose to plan your service when not on your cycle to avoid sensitivity.</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 mh-post mt-20">
                        <b>After:</b>
                        <ul class="txt-holder list-unstyled mt-10 mh-treatmentlist">
                            <li>No vigorous workouts: over-perspiration can harbour bacteria in the open follicle.</li>
                            <li>Slight redness can appear post-treatment but dissipates.</li>
                            <li>Avoid suntanning post-treatment.</li>
                        </ul>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
        <div class="mh-pricinglist-areas">
            <div class="col-sm-6 col-sm-offset-3">
                <hr />
                <h2 class="font-arizonia text-center f-24 no-underline">Services</h2>
                <ul class="mh-pricelist">
                    <li class="sub-item-service">
                        <span class="name">Eyebrows</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$20.00+</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Lip</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$12.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Eyebrows+Lip</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$30.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Chin</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$15.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Neck</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$20.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Arms(half)</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$32.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Arms(full) & knuckles+fingers</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$38.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Under Arms</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$18.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Shoulders+Back</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$70.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Chest</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$40.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Legs(upper)</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$35.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Legs(lower)</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$30.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Legs (full) & Toes + feet</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$60.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Bikini</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$30.00</b>--}}</span>
                    </li>
                    <li class="sub-item-service">
                        <span class="name">Brazilian</span>
                        {{--<span class="border"></span>--}}
                        <span class="price">{{--<b>$50.00</b>--}}</span>
                    </li>
                </ul>
                {{--<small><sup>*</sup><i>Prices subject to change without notice.</i></small>--}}
            </div>
        </div>
    </div>
</section>
@endsection