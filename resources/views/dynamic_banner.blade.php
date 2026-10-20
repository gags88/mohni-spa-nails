@extends('layout.app')

@section('title', app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Mohni Nails Spa">
<meta name="keywords" content="Nails Spa">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection
@section('content')
@include('includes.slider_priomotions')
<section id="mh-paradisecenter" class="mh-paradisecenter mh-sectionspace mh-haslayout">
    <div class="container">
        @include('pages.about-content')
        <!-- <div class="row">
            <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">
                <div class="mh-sectionhead mb-50">
                    <div class="mh-sectiontitle">
                        <h2><span>Welcome to</span>
                            {{ app_name() }}
                        </h2>
                    </div>
                    <div class="mh-headcontent">
                        <div class="mh-description">
                            <p>Mohni Spa & Nails has been in operation for numerous years. We offer full range of beauty, nail and spa services for women and men alike. Our Services include, but are not limited to Eyebrows, Tinting, Spa packages, and Facial packages including hydra facial and micro-derma facials, and Nail Care of various categories.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mh-paradisecenter-area mh-haslayout mh-headcontent">
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <div class="mh-paradisecenterimgbox">
                        <figure class="mh-paradiseimage">
                            <img src="images/about.png" class="img-responsive">
                        </figure>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mh-description">
                    <div class="mh-sectiontitle">
                        <h2><span>Our Values &amp; Mission</span>
                        </h2>
                    </div>
                    <div class="mb-20">Our commitment at Mohni Spa and Nails is to provide each and every client with an exceptional experience, each and every time they visit us. We provide an Oasis away from the hustle and bustle of everyday life by creating an ambiance of true relaxation, calm, and serenity. We are able to provide this type of service by upholding the values of professionalism, sanitation, and world-class customer service.</div>
                    <p>Our goal is to provide each and every client with the best service in the industry. We pride ourselves in our extraordinary customer service and use of high quality products and sterile equipment.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 mt-20 text-center">
                <a href="/about" class="mh-btn">Know More</a>
            </div>
        </div> -->
    </div>
</section>
<section id="mh-whychooseus" class="mh-whychooseus mh-sectionspace mh-bg mh-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">
                <div class="mh-sectionhead mb-30">
                    <div class="mh-sectiontitle">
                        <h2><span>{{ app_name() }}</span>
                            Why Choose Us
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <figure class="mh-whychooseus-img" style="margin-left: -12px">
                    <img src="images/whyus.jpeg" alt="" style="max-width: 100%">
                </figure>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <ul class="list-unstyled mh-paradiselist">
                    <li class="mh-paradisecenterbox">
                        <span class="mh-paradiseiconbox">
                            <i class="ti-credit-card"></i>
                        </span>
                        <div class="mh-paradisecontent">
                            <h3 class="mh-headingtree">Reasonable Costs</h3>
                            <div class="mh-description">
                                <p>We offer best services in locality at very reasonable costs.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mh-paradisecenterbox">
                        <span class="mh-paradiseiconbox">
                            <i class="ti-user"></i>
                        </span>
                        <div class="mh-paradisecontent">
                            <h3 class="mh-headingtree">Qualified Staff</h3>
                            <div class="mh-description">
                                <p>Our staff is highly knowledgable and equipped to provide you service.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mh-paradisecenterbox">
                        <span class="mh-paradiseiconbox">
                            <i class="ti-face-smile"></i>
                        </span>
                        <div class="mh-paradisecontent">
                            <h3 class="mh-headingtree">Relaxation Centric</h3>
                            <div class="mh-description">
                                <p>Located in quiet neighbourhood, you will experience a nice and calm environment.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mh-paradisecenterbox mb-20">
                        <span class="mh-paradiseiconbox">
                            <i class="ti-heart-broken"></i>
                        </span>
                        <div class="mh-paradisecontent">
                            <h3 class="mh-headingtree">Variety of services</h3>
                            <div class="mh-description">
                                <p>We offer many services according to your needs and provide expected results.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="mh-services" class="mh-services v2 mh-sectionspace mh-haslayout">
    <div class="container">
        <div class="row">
            <div class=" col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">
                <div class="mh-sectionhead mb-50">
                    <div class="mh-sectiontitle">
                        <h2 class="text-capitalize"><span>Our</span>
                            services
                        </h2>
                    </div>
                </div>
            </div>
            <div id="mh-servicesslider" class="mh-servicesslider owl-carousel owl-theme mh-haslayout">
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="/images/services/laser.JPG"  alt="laser hair removal">
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Laser Hair Removal</h3>
                            <div class="mh-description">
                                <p>We offer a technologically advanced treatment using <strong>Soprano ICE Platinum</strong>.</p>
                            </div>
                            <a href="/services/laser-hair-removal" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/th-micro-needling.jpeg" alt="microneedling" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Microneedling</h3>
                            <div class="mh-description">
                                <p>Microneedling works by encouraging your skin to make more collagen.</p>
                            </div>
                            <a href="/services/micro-needling" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/th-laser-removal.png" alt="images description" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Hydra Facial</h3>
                            <div class="mh-description">
                                <p>Hydrafacial improves overall skin texture, tone, and appearance.</p>
                                <br />
                            </div>
                            <a href="/services/facials" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/th-dermaplaning.jpeg" alt="images description" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Dermaplaning</h3>
                            <div class="mh-description">
                                <p>Dermaplaning aims to make your skin's surface smooth, youthful, and radiant.</p>
                            </div>
                            <a href="/services/dermaplaning" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/facial-service.JPG" alt="Facial" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Facials</h3>
                            <div class="mh-description">
                                <p>All our facial services includes including cleansing, exfoliation &amp; extractions.</p>
                            </div>
                            <a href="/services/facials" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/body-glow.jpeg" alt="Body treatments" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Body treatments</h3>
                            <div class="mh-description">
                                <p>We use authentic healing therapy &amp; powerful ingredients to nurture, restore your body &amp; senses.</p>
                            </div>
                            <a href="/services/body-treatments" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/hot_stone_massage.jpeg" alt="Massage" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Massage</h3>
                            <div class="mh-description">
                                <p>Massage therapy will overall enhance senses of emotional and physical well-being.</p>
                            </div>
                            <a href="/services/massage" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/makeup_grid1.jpeg" alt="Makeup" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Makeup</h3>
                            <div class="mh-description">
                                <p>Let your true beauty shine for all the world to see.</p>
                                <br />
                            </div>
                            <a href="/services/makeup" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/threading_img.jpg" alt="threading" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Threading</h3>
                            <div class="mh-description">
                                <p>Ideal for any skin type, this ancient form of hair removal.</p>
                                <br />
                            </div>
                            <a href="/services/threading" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/tinying_img.jpg" alt="tinting" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Tinting</h3>
                            <div class="mh-description">
                                <p>Tinting is a process to boost the natural colour of your brows.</p>
                                <br />
                            </div>
                            <a href="/services/tinting" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/waxing.JPG" alt="Waxing" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Waxing</h3>
                            <div class="mh-description">
                                <p>Waxing is one of the most effective way to get your skin smooth and soft.</p>
                            </div>
                            <a href="/services/waxing" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/sugaring.PNG" alt="Sugaring" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Sugaring</h3>
                            <div class="mh-description">
                                <p>Sugaring, an ancient method, is another way to remove unwanted hair.</p>
                            </div>
                            <a href="/services/sugaring" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="mh-servicebox">
                        <figure class="mh-serviceimg">
                            <img src="images/services/mani-pedi.JPG" alt="mani-pedi" >
                        </figure>
                        <div class="mh-servicecontent">
                            <h3 class="mh-headingtree">Manicure/Pedicure</h3>
                            <div class="mh-description">
                                <p>Our treatments will leave you feeling relaxed and rejuvenated during your time with us.</p>
                            </div>
                            <a href="/services/manicure-pedicure" class="mh-btn">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('pages.testimonials')
@endsection