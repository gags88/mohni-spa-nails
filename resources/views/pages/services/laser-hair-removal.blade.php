@extends('layout.app')

@section('title', 'Laser Hair Removal in Winnipeg | ' . app_name())
@section('website_meta')
<meta name="description" content="Comfort-focused Soprano ICE Platinum laser hair removal in St. Boniface, Winnipeg. Explore treatment details and area-by-area pricing.">
<meta name="keywords" content="laser hair removal Winnipeg, Soprano ICE Platinum, laser pricing Winnipeg">
<meta name="author" content="{{ app_name() }}">
@endsection

@section('content')
<section class="mohni-service-hero" aria-labelledby="laser-title">
    <img src="/images/hero/laser-luxury-hero.webp" alt="Comfortable laser hair removal treatment at Mohni Spa & Nails">
    <div class="mohni-service-hero__veil" aria-hidden="true"></div>
    <div class="container mohni-service-hero__container">
        <div class="mohni-service-hero__content">
            <p class="mohni-eyebrow">Our signature treatment</p>
            <h1 id="laser-title">Laser hair removal,<br>beautifully considered.</h1>
            <p>Advanced Soprano ICE Platinum technology with a calm, personal approach to every consultation and treatment.</p>
            <div class="mohni-inline-actions">
                <a href="https://book.squareup.com/appointments/shyx8cf9hexrvs/location/LDNGWM2MCEDEJ/services" class="mh-btn">Book a consultation</a>
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

@php
    $laserPricing = [
        'Face & Neck' => [
            ['Upper Lip', '$69+'], ['Upper Lip + Chin', '$115+'], ['Cheeks', '$80+'],
            ['Neck', '$75+'], ['Sideburns', '$75+'], ['Ears', '$50+'],
            ['Uni-brow', '$50+'], ['Full Face', '$150+'],
        ],
        'Upper Body' => [
            ['Fingers + Toes', '$50+'], ['Underarms', '$99+'], ['Half Arms', '$150+'],
            ['Shoulders', '$99+'], ['Full Arms', '$199+'], ['Areolas', '$75+'],
            ['Stomach', '$125+'], ['Chest', '$150+'],
        ],
        'Back & Lower Body' => [
            ['Upper Back', '$125+'], ['Lower Back', '$125+'], ['Full Back', '$199+'],
            ['Full Chest + Full Back', '$299+'], ['Bikini Line', '$125+'], ['Buttocks', '$125+'],
            ['Full Brazilian', '$175+'], ['Upper Legs', '$225+'], ['Lower Legs', '$175+'],
            ['Full Legs', '$299+'],
        ],
    ];
@endphp

<section id="laser-pricing" class="mohni-pricing mohni-section" aria-labelledby="pricing-title">
    <div class="container">
        <div class="mohni-heading-row">
            <div>
                <p class="mohni-eyebrow">Simple &amp; transparent</p>
                <h2 id="pricing-title" class="mohni-display">Laser pricing.</h2>
            </div>
            <div class="mohni-pricing__offer">
                <strong>Package of 6</strong>
                <span>Receive 25% off</span>
            </div>
        </div>
        <div class="mohni-pricing__grid">
            @foreach ($laserPricing as $group => $items)
                <section class="mohni-price-card" aria-labelledby="price-{{ Str::slug($group) }}">
                    <h3 id="price-{{ Str::slug($group) }}">{{ $group }}</h3>
                    <ul class="list-unstyled">
                        @foreach ($items as [$name, $price])
                            <li><span>{{ $name }}</span><strong>{{ $price }}</strong></li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </div>
        <p class="mohni-pricing__note">Prices shown are starting prices per session and may change without notice. Your consultation will confirm treatment areas, timing and exact pricing.</p>
    </div>
</section>

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

<section class="mohni-laser-cta">
    <div class="container">
        <p class="mohni-eyebrow">Ready when you are</p>
        <h2>Begin with a complimentary consultation.</h2>
        <p>Ask questions, explore the right areas and leave with a plan designed for you.</p>
        <a href="https://book.squareup.com/appointments/shyx8cf9hexrvs/location/LDNGWM2MCEDEJ/services" class="mh-btn">Book your consultation</a>
    </div>
</section>
@endsection
