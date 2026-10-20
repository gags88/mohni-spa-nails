@extends('layout.app')

@section('title', 'Services - Body Treatments | ' .app_name() . ' in Winnipeg, Manitoba')
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
                        <li>Body treatments</li>
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
                            Body Treatment
                        </h2>
                    </div>
                    <div class="mh-description mb-40 text-center">
                        Using a combination of authentic healing therapy and powerful ingredients. We nurture and restore your body and your senses.
                    </div>
                    <div class="mh-headcontent text-left">
                        <div class="col-xs-12 col-sm-5 hidden-xs">
                            <img src="/images/services/body-glow.jpeg" class="mh-border img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-7 mh-description mh-postdetails">
                            <h2>
                                Body Glow
                            </h2>
                            <div class="col-xs-12 visible-xs mb-20">
                                <img src="/images/services/body-glow.jpeg" class="mh-border img-responsive">
                            </div>
                            <div class="mb-20">A renewing treatment to soften the skin, removing dead skin cells and leaving the skin soft and silky. Using the Comfort Zone Body Strategist line, the Body Glow Treatment is great for everyone and maybe done before and after sun exposure to renew and soften the skin.</div>
                            <strong>Benefits</strong>
                            <div class="mh-post">
                                <ul class="mh-treatmentlist">
                                    <li>Soft, silky skin.</li>
                                    <li>Glowing, luminous appearance.</li>
                                    <li>Improved microcirculation, giving your skin a fresh glow.</li>
                                    <li>Keep the skin looking young and fresh.</li>
                                    <li>Brightens skin tone.</li>
                                    <li>Evens out skin complexion.</li>
                                    <li>Reduces the appearance of blemishes and scars.</li>
                                    <li>Nourishes and hydrates skin.</li>
                                    <li>Smoothes out skin texture.</li>
                                    <li>Provides long-lasting results.</li>
                                </ul>
                                <hr />
                            </div>
                            <p><b>Duration:</b> 1 hour</p>
                            <p><b>Price:</b> $80.00+<sup>*</sup></p>
                            <small><sup>*</sup><i>Prices subject to change without notice.</i></small>
                            <hr />
                        </div>
                    </div>
                    <div class="mh-headcontent text-left mt-20">
                        <div class="col-xs-12 col-sm-7 mh-description mh-postdetails">
                            <h2>
                                Body Treatment Wrap
                            </h2>
                            <div class="col-xs-12 visible-xs mb-20">
                                <img src="/images/services/body-treatment-wraps.jpeg" class="mh-border img-responsive">
                            </div>
                            <div class="mb-20">A body wrap is a spa treatment experience and can also be called a body 'cocoon'. It begins with some kind of exfoliation, which is a fancy word that means removing dead skin cells. The body mask will contain a mixture of ingredients designed to have a remedial effect on your skin, while the coverings will swathe and warm your body, promoting muscle relaxation, and sweating to cleanse your pores.</div>
                            <strong>Depending on the wrap you choose, you might notice:</strong>
                            <div class="mh-post">
                                <ul class="mh-treatmentlist">
                                    <li>Temporary inch loss</li>
                                    <li>Softer, firmer, hydrated or cleansed skin.</li>
                                    <li>Reduced appearance of cellulite.</li>
                                    <li>Relaxed muscles.</li>
                                </ul>
                                <hr />
                            </div>
                            <p><b>Duration:</b> 1.5 hours</p>
                            {{-- <p><b>Price:</b> $150.00+<sup>*</sup></p>
                            <small><sup>*</sup><i>Prices subject to change without notice.</i></small>
                            <hr /> --}}
                        </div>
                        <div class="col-xs-12 col-sm-5 hidden-xs">
                            <img src="/images/services/body-treatment-wraps.jpeg" class="mh-border img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection