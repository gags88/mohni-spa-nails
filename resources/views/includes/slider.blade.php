<div id="mh-homeslider3" class="mh-homeslider owl-carousel owl-theme mh-haslayout">
    @if (count($banners) > 0)
        @foreach ($banners as $banner)
        <div class="item">
            <div class="containers">
                <div class="row">
                    <div class="col-xs-12">
                        <img src="/image/{{ $banner->image }}" alt="image description" class="moh_banner">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    <div class="item">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mh-slidercontent-area">
                        <figure class="mh-sliderimg">
                            <img src="/images/slider-laser-removal.png" alt="image description">
                            <figcaption class="mh-slidercontent">
                                <h1><span>Never own a razor again</span>Laser Hair Removal</h1>
                                <div class="mh-description">
                                    <p class="hidden-xs">We offer technologically advanced treatment using Soprano ICE Platinum</p>
                                    <p class="hidden-xs"><span class="txt-holder">Free consultation for laser treatment over the phone or in-person.</span></p>
                                    <!--<p class="blink promotion-color banner-promotion">25% off on package of 6 treatments</p>-->
                                </div>
                                <a href="https://book.squareup.com/appointments/shyx8cf9hexrvs/location/LDNGWM2MCEDEJ/services" class="mh-btn">Book now</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mh-slidercontent-area">
                        <figure class="mh-sliderimg">
                            <img src="images/hydra-facial.png" alt="image description">
                            <figcaption class="mh-slidercontent">
                                <h1><span>Beauty &amp; Facial</span>Hydra Facial</h1>
                                <div class="mh-description">
                                    <p class="hidden-xs">HydraFacial is a patented skin treatment known for its three-step process.</p>
                                    <p class="hidden-xs">HydraFacial works to deep-clean, exfoliate, and hydrate your skin.</p>
                                    <!--<p class="blink promotion-color banner-promotion">20% off on package of 3 treatments</p>-->
                                </div>
                                <a href="/services/facials" class="mh-btn">More infomation</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>