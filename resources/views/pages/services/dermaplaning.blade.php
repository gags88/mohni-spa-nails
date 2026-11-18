@extends('layout.app')

@section('title', 'Services - Dermaplaning | ' .app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Mohni Nails Spa">
<meta name="keywords" content="Nails Spa">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection
@section('content')
@include('pages.services.partials.editorial-hero', ['serviceKey' => 'dermaplaning'])
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
        </div>
        @include('pages.services.partials.treatment-menu', [
            'menuKey' => 'facials',
            'menuIdSuffix' => 'dermaplaning',
            'menuTitle' => 'Dermaplaning pricing',
            'menuIntro' => 'Choose a focused exfoliation treatment or pair dermaplaning with a complete facial.',
            'only' => ['Dermaplaning', 'Dermaplaning Facial'],
        ])
    </div>
</section>
@endsection
