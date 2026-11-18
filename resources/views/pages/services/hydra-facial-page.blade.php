@extends('layout.app')

@section('title', 'HydraFacial | ' . app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Signature, Deluxe and Platinum HydraFacial treatments at Mohni Nail and Spa in Winnipeg.">
<meta name="keywords" content="HydraFacial Winnipeg, facial treatments, skin hydration">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection

@section('content')
@include('pages.services.partials.editorial-hero', ['serviceKey' => 'hydra-facial'])
<div id="mh-innerbanner" class="mh-innerbanner mh-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mh-innerbanner-area">
                    <div class="mh-bannarheading"><h1>HydraFacial</h1></div>
                    <ul class="list-unstyled mh-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>HydraFacial</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="mh-paradisecenter mh-sectionspace mh-haslayout mb-20 service">
    <div class="container">
        @include('pages.services.partials.treatment-menu', [
            'menuKey' => 'facials',
            'menuIdSuffix' => 'hydrafacial',
            'menuTitle' => 'HydraFacial treatments',
            'menuIntro' => 'Cleansing, exfoliation and hydration in a treatment selected for the level of care your skin needs.',
            'only' => ['Signature HydraFacial', 'Deluxe HydraFacial', 'Platinum HydraFacial'],
        ])

        @include('pages.services.hydra-facial')

    </div>
</section>
@endsection
