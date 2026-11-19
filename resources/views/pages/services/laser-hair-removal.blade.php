@extends('layout.app')

@section('title', 'Laser Hair Removal in Winnipeg | ' . app_name())
@section('website_meta')
<meta name="description" content="Comfort-focused Soprano ICE Platinum laser hair removal in St. Boniface, Winnipeg. Explore treatment details and area-by-area pricing.">
<meta name="keywords" content="laser hair removal Winnipeg, Soprano ICE Platinum, laser pricing Winnipeg">
<meta name="author" content="{{ app_name() }}">
@endsection

@section('content')
<section class="mohni-service-hero" aria-labelledby="laser-title">
    <img src="/images/hero/laser-luxury-hero-v2.webp" alt="Professional laser hair removal treatment at Mohni Spa & Nails">
    <div class="mohni-service-hero__veil" aria-hidden="true"></div>
    <div class="container mohni-service-hero__container">
        <div class="mohni-service-hero__content">
            <p class="mohni-eyebrow">Our signature treatment</p>
            <h1 id="laser-title">Laser hair removal,<br>beautifully considered.</h1>
            <p>Advanced Soprano ICE Platinum technology with a calm, personal approach to every consultation and treatment.</p>
            <div class="mohni-inline-actions">
                <a href="{{ route('booking.index', ['category' => 'laser'], false) }}" class="mh-btn">Book now</a>
                <a href="#laser-pricing" class="mohni-text-link">View pricing <span aria-hidden="true">&darr;</span></a>
            </div>
        </div>
    </div>
</section>

<section class="mohni-laser-intro mohni-section">
    <div class="container">
        <div class="mohni-laser-intro__grid">
            <div>
                <p class="mohni-eyebrow">Soprano ICE Platinum</p>
                <h2 class="mohni-display">A smoother routine starts with a more comfortable treatment.</h2>
            </div>
            <div class="mohni-laser-intro__copy">
                <p>Soprano ICE Platinum uses in-motion technology to gradually heat the treatment area while its sapphire tip cools the skin. The approach is designed to make laser hair removal efficient and comfortable across a broad range of skin tones.</p>
                <p>Your journey begins with a consultation. We will discuss your goals, treatment areas, skin and hair profile, preparation and the timing that makes sense for you.</p>
            </div>
        </div>
        <div class="mohni-laser-benefits">
            <article><span>01</span><h3>Comfort focused</h3><p>Continuous movement and contact cooling help create a gentler experience.</p></article>
            <article><span>02</span><h3>Personal plan</h3><p>Timing and treatment areas are tailored during your consultation.</p></article>
            <article><span>03</span><h3>All-season confidence</h3><p>A practical path away from the constant cycle of shaving and waxing.</p></article>
        </div>
    </div>
</section>

<section class="mohni-laser-video mohni-section" aria-labelledby="laser-video-title">
    <div class="container">
        <div class="mohni-laser-video__heading">
            <p class="mohni-eyebrow">See the technology in motion</p>
            <h2 id="laser-video-title" class="mohni-display">A closer look at laser hair removal.</h2>
            <p>Learn more about the treatment experience before your personal consultation.</p>
        </div>

        <div class="mohni-laser-video__frame is-covered is-ready" data-laser-video data-video-id="MBk0Q670LXE">
            <div id="laser-video-player"></div>
            <div class="mohni-laser-video__end" aria-hidden="false">
                <p class="mohni-eyebrow">Mohni Nail and Spa</p>
                <h3 data-laser-video-status>See the treatment in motion.</h3>
                <button type="button" class="mh-btn" data-laser-video-action>Play video</button>
            </div>
            <noscript>
                <iframe src="https://www.youtube-nocookie.com/embed/MBk0Q670LXE?rel=0&amp;modestbranding=1&amp;playsinline=1" title="Laser hair removal treatment video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </noscript>
        </div>
    </div>
</section>

@php
    $laserPricing = config('laser-pricing');
    $laserPromotionTerms = config('laser-promotion-terms');
@endphp

<section class="mohni-process mohni-section" aria-labelledby="process-title">
    <div class="container">
        <div class="mohni-process__grid">
            <div>
                <p class="mohni-eyebrow">Your treatment journey</p>
                <h2 id="process-title" class="mohni-display">Know what to expect.</h2>
                <p>Most treatment plans involve a series of appointments spaced around the hair-growth cycle. We will guide you through the details at every step.</p>
            </div>
            <ol class="mohni-process__steps">
                <li><span>01</span><div><h3>Consult</h3><p>We review your goals, health history, skin and hair profile, then create your plan.</p></div></li>
                <li><span>02</span><div><h3>Prepare</h3><p>Avoid waxing, shave the area about 24 hours before, and arrive with clean, product-free skin.</p></div></li>
                <li><span>03</span><div><h3>Treat &amp; care</h3><p>We keep you comfortable during treatment and explain the aftercare for your skin.</p></div></li>
            </ol>
        </div>
    </div>
</section>

<section id="laser-pricing" class="mohni-pricing mohni-section" aria-labelledby="pricing-title">
    <div class="container">
        <div class="mohni-heading-row mohni-heading-row--pricing">
            <div>
                <p class="mohni-eyebrow">Simple &amp; transparent</p>
                <h2 id="pricing-title" class="mohni-display">Laser pricing.</h2>
                <p class="mohni-pricing__intro">Explore pricing for women, men and current package promotions.</p>
            </div>
        </div>

        <div class="mohni-laser-accordion">
            @foreach ($laserPricing as $audience => $sections)
                <details class="mohni-laser-accordion__item" name="laser-pricing">
                    <summary>
                        <span>
                            <small>Laser hair removal</small>
                            <strong>{{ $audience }}</strong>
                        </span>
                        <i aria-hidden="true"></i>
                    </summary>

                    <div class="mohni-laser-accordion__body">
                        @foreach ($sections as $section => $items)
                            <section class="mohni-laser-price-group" aria-labelledby="laser-{{ Str::slug($audience) }}-{{ Str::slug($section) }}">
                                <h3 id="laser-{{ Str::slug($audience) }}-{{ Str::slug($section) }}">{{ $section }}</h3>
                                <ul class="list-unstyled">
                                    @foreach ($items as [$name, $price])
                                        <li>
                                            <span>{{ $name }}</span>
                                            <span class="mohni-laser-price-group__actions">
                                                <strong>{{ $price }}</strong>
                                                <a href="{{ route('booking.index', ['service' => $name, 'category' => 'laser'], false) }}" aria-label="Book {{ $name }}">Book</a>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>
                        @endforeach
                        @if ($audience === 'Promotions')
                            <section class="mohni-laser-promotion-terms" aria-labelledby="laser-promotion-terms">
                                <p class="mohni-eyebrow">Please note</p>
                                <h3 id="laser-promotion-terms">Promotion details</h3>
                                <ul>
                                    @foreach ($laserPromotionTerms as $term)
                                        <li>{{ $term }}</li>
                                    @endforeach
                                </ul>
                            </section>
                        @endif
                    </div>
                </details>
            @endforeach
        </div>
        <p class="mohni-pricing__note">Your consultation will confirm treatment areas, timing and exact pricing.</p>
    </div>
</section>

<section class="mohni-laser-cta">
    <div class="container">
        <p class="mohni-eyebrow">Ready when you are</p>
        <h2>Begin with a complimentary consultation.</h2>
        <p>Ask questions, explore the right areas and leave with a plan designed for you.</p>
        <a href="{{ route('booking.index', ['service' => 'Laser Consultation', 'category' => 'laser'], false) }}" class="mh-btn">Book your consultation</a>
    </div>
</section>
@endsection

@section('page_scripts')
<script src="/js/laser-video.js?v=1.1" defer></script>
@endsection
