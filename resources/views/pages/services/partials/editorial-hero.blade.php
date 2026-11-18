@php($service = config('service-pages.' . $serviceKey))

<section class="mohni-editorial-service" aria-labelledby="service-{{ $serviceKey }}-title">
    <div class="container">
        <div class="mohni-editorial-service__grid">
            <div class="mohni-editorial-service__content">
                <nav class="mohni-editorial-service__breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span aria-hidden="true">/</span><span>Services</span>
                </nav>
                <p class="mohni-eyebrow">{{ $service['eyebrow'] }}</p>
                <h1 id="service-{{ $serviceKey }}-title">{{ $service['title'] }}</h1>
                <p class="mohni-editorial-service__intro">{{ $service['intro'] }}</p>
                <div class="mohni-inline-actions">
                    <a href="{{ config('services.booking.url') }}" class="mh-btn">Book an appointment</a>
                    @if (!empty($service['price_anchor']))
                        <a href="#{{ $service['price_anchor'] }}" class="mohni-text-link">View pricing <span aria-hidden="true">&darr;</span></a>
                    @endif
                </div>
            </div>
            <figure class="mohni-editorial-service__image">
                <img src="{{ $service['image'] }}" alt="{{ $service['alt'] }}">
            </figure>
        </div>
    </div>
</section>
