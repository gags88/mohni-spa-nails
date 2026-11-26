@php
    $content = config('service-content.' . $serviceKey);
    $pricing = $content['pricing'] ?? null;
    $isMicroneedling = $serviceKey === 'micro-needling';
@endphp

@include('pages.services.partials.editorial-hero', ['serviceKey' => $serviceKey])

<main class="mohni-service-page">
    <section class="mohni-service-overview" aria-labelledby="{{ $serviceKey }}-overview-title">
        <div class="container">
            <div class="mohni-service-overview__grid">
                <div class="mohni-service-overview__heading">
                    <p class="mohni-eyebrow">Your treatment</p>
                    <h2 id="{{ $serviceKey }}-overview-title">{{ $content['overview_title'] }}</h2>
                </div>
                <div class="mohni-service-overview__copy">
                    @foreach ($content['overview'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                    @if (!empty($content['highlights_title']))
                        <h3>{{ $content['highlights_title'] }}</h3>
                    @endif
                    <ul class="mohni-service-highlights">
                        @foreach ($content['highlights'] as $highlight)
                            <li>{{ $highlight }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if (!empty($content['sections']))
        <section class="mohni-service-guides{{ $isMicroneedling ? ' mohni-service-guides--editorial' : '' }}" aria-label="Treatment information">
            <div class="container">
                <div class="mohni-service-guides__grid">
                    @foreach ($content['sections'] as $section)
                        <article class="mohni-service-guide">
                            @unless ($isMicroneedling)
                                <span class="mohni-service-guide__number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            @endunless
                            <h2>{{ $section['title'] }}</h2>
                            @foreach ($section['body'] ?? [] as $paragraph)
                                <p>{{ $paragraph }}</p>
                            @endforeach
                            @if (!empty($section['list']))
                                <ul>
                                    @foreach ($section['list'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($isMicroneedling)
        <section class="mohni-section mohni-microneedling-results" aria-labelledby="microneedling-results-title">
            <div class="container">
                <h2 id="microneedling-results-title" class="mohni-display">Before and after</h2>
                <div class="mohni-microneedling-gallery">
                    @foreach ([
                        ['000', 576, 458, 'Cheek texture'],
                        ['001', 676, 404, 'Fine lines around the eye'],
                        ['002', 1080, 434, 'Cheek and jawline'],
                        ['003', 1080, 519, 'Cheek blemishes'],
                        ['004', 445, 445, 'Cheek texture in profile'],
                    ] as [$photo, $width, $height, $description])
                        <figure>
                            <div class="mohni-microneedling-gallery__frame">
                                <img src="/images/services/microneedling/before-after-{{ $photo }}.jpg" width="{{ $width }}" height="{{ $height }}" alt="Before and after: {{ $description }}" loading="lazy">
                            </div>
                            <figcaption>{{ $description }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($pricing)
        <div class="container mohni-service-pricing">
            @include('pages.services.partials.treatment-menu', $pricing)
        </div>
    @endif

    @if (!$pricing)
        <section class="mohni-service-cta">
            <div class="container">
                <div class="mohni-service-cta__inner">
                    <div>
                        <p class="mohni-eyebrow">Mohni Nail and Spa</p>
                        <h2>Ready for your appointment?</h2>
                    </div>
                    <a href="{{ config('services.booking.url') }}" class="mh-btn">Book an appointment</a>
                </div>
            </div>
        </section>
    @endif
</main>
