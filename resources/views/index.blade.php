@extends('layout.app')

@section('title', 'Laser Hair Removal & Spa Services in Winnipeg | ' . app_name())
@section('website_meta')
<meta name="description" content="Luxury laser hair removal, skin, body and beauty treatments in St. Boniface, Winnipeg.">
<meta name="keywords" content="laser hair removal Winnipeg, spa Winnipeg, facials, nails, massage">
<meta name="author" content="{{ app_name() }}">
@endsection

@section('content')
@include('includes.slider')

<section class="mohni-intro mohni-section">
    <div class="container">
        <div class="mohni-intro__grid">
            <div>
                <p class="mohni-eyebrow">Quiet luxury. Thoughtful care.</p>
                <h2 class="mohni-display">Modern treatments,<br>made personal.</h2>
            </div>
            <div class="mohni-intro__copy">
                <p>Welcome to Mohni Spa &amp; Nails in the heart of St. Boniface. Our approach pairs advanced aesthetics with a warm, unhurried experience—so every visit feels considered from consultation to aftercare.</p>
                <a href="/about" class="mohni-text-link">Our story <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </div>
</section>

<section id="mh-services" class="mohni-services mohni-section" aria-labelledby="services-title">
    <div class="container">
        <div class="mohni-heading-row">
            <div>
                <p class="mohni-eyebrow">Explore our care</p>
                <h2 id="services-title" class="mohni-display">Services for skin,<br>body &amp; beauty.</h2>
            </div>
            <p>From our signature laser program to restorative facials and finishing touches, find the treatment that meets you where you are.</p>
        </div>

        @php
            $services = [
                ['title' => 'Laser Hair Removal', 'label' => 'Our specialty', 'image' => '/images/hero/laser-luxury-hero-v2.webp', 'url' => '/services/laser-hair-removal', 'featured' => true],
                ['title' => 'Facials & HydraFacial', 'label' => 'Skin', 'image' => '/images/services/editorial/facial-treatment-v3.webp', 'url' => '/services/facials'],
                ['title' => 'Microneedling', 'label' => 'Skin', 'image' => '/images/services/editorial/microneedling-v2.webp', 'url' => '/services/micro-needling'],
                ['title' => 'Dermaplaning', 'label' => 'Skin', 'image' => '/images/services/editorial/dermaplaning-v2.webp', 'url' => '/services/dermaplaning'],
                ['title' => 'Body Treatments', 'label' => 'Body', 'image' => '/images/services/body-treatment-wraps.jpeg', 'url' => '/services/body-treatments'],
                ['title' => 'Massage', 'label' => 'Body', 'image' => '/images/services/editorial/massage-v2.webp', 'url' => '/services/massage'],
                ['title' => 'Waxing', 'label' => 'Hair removal', 'image' => '/images/services/waxing.JPG', 'url' => '/services/waxing'],
                ['title' => 'Brows & Tinting', 'label' => 'Beauty', 'image' => '/images/services/editorial/threading-v2.webp', 'url' => '/services/threading'],
                ['title' => 'Manicure & Pedicure', 'label' => 'Nails', 'image' => '/images/services/mani-pedi.JPG', 'url' => '/services/manicure-pedicure'],
                ['title' => 'Kids Manicure & Pedicure', 'label' => 'Kids under 10', 'image' => '/images/services/nail-kids.jpg', 'url' => '/services/manicure-pedicure#treatment-menu-nails'],
            ];
        @endphp

        <div class="mohni-service-grid">
            @foreach ($services as $service)
                <a href="{{ $service['url'] }}" class="mohni-service-card {{ !empty($service['featured']) ? 'mohni-service-card--featured' : '' }}">
                    <img src="{{ $service['image'] }}" alt="{{ $service['title'] }} at Mohni Spa & Nails" loading="lazy">
                    <span class="mohni-service-card__shade" aria-hidden="true"></span>
                    <span class="mohni-service-card__content">
                        <small>{{ $service['label'] }}</small>
                        <strong>{{ $service['title'] }}</strong>
                        <em>Discover <span aria-hidden="true">&rarr;</span></em>
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="mohni-values mohni-section" aria-labelledby="values-title">
    <div class="container">
        <div class="mohni-values__heading">
            <p class="mohni-eyebrow">Mohni Nail and Spa</p>
            <h2 id="values-title" class="mohni-display">Care you can feel.</h2>
        </div>
        <div class="mohni-values__grid">
            <article><span>01</span><h3>Personal attention</h3><p>Recommendations shaped around your comfort, goals and skin.</p></article>
            <article><span>02</span><h3>Advanced technology</h3><p>Thoughtfully selected treatments and professional equipment.</p></article>
            <article><span>03</span><h3>Calm surroundings</h3><p>A clean, welcoming studio created for unhurried self-care.</p></article>
            <article><span>04</span><h3>Transparent pricing</h3><p>Clear treatment options so you can choose with confidence.</p></article>
        </div>
    </div>
</section>

@include('pages.testimonials')
@endsection
