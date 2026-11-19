@extends('layout.booking')

@section('title', 'Book an Appointment | ' . app_name())
@section('website_meta')
<meta name="description" content="Choose your treatment and begin booking an appointment at {{ app_name() }}.">
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<main class="mohni-booking-app">
    <div class="mohni-booking-app__frame">
        <header class="mohni-booking-app__header">
            <div class="mohni-booking-heading">
                <div>
                    <p class="mohni-eyebrow">Private online booking</p>
                    <h1 class="mohni-display">Choose your treatment.</h1>
                    <p>Choose one treatment. You will see real appointment times before entering any personal details.</p>
                </div>
                <div class="mohni-booking-live"><i></i> Connected to our live calendar</div>
            </div>

            @include('pages.booking.partials.progress', ['currentStep' => 1])
        </header>

        <section class="mohni-booking-app__body" aria-labelledby="service-menu-title">
            <div class="mohni-booking__toolbar">
                <div>
                    <p class="mohni-eyebrow">Step one</p>
                    <h2 id="service-menu-title">Choose a category</h2>
                </div>
                <label class="mohni-booking-search">
                    <span class="sr-only">Search services</span>
                    <input type="search" value="{{ $requestedFilter }}" placeholder="Search treatments" data-booking-search autocomplete="off">
                </label>
            </div>

            <nav class="mohni-booking-category-nav" aria-label="Service categories">
                @foreach ($serviceGroups as $category => $services)
                    <button type="button" data-booking-category-target="booking-category-{{ Str::slug($category) }}">
                        {{ $category }} <span>{{ $services->count() }}</span>
                    </button>
                @endforeach
            </nav>

            @if ($serviceGroups->isEmpty())
                <div class="mohni-booking-empty">
                    <h3>No online services are available yet.</h3>
                    <p>Please call us at <a href="tel:+12042194071">204-219-4071</a> and we will be happy to help.</p>
                </div>
            @else
                <form class="mohni-booking-form" data-booking-services-form data-booking-loading-form method="GET" action="{{ route('booking.availability', [], false) }}">
                    <div class="mohni-booking-groups">
                        @foreach ($serviceGroups as $category => $services)
                            <section id="booking-category-{{ Str::slug($category) }}" class="mohni-booking-group mohni-booking-group--static" data-booking-group aria-labelledby="booking-category-title-{{ Str::slug($category) }}">
                                <header class="mohni-booking-group__header">
                                    <span>
                                        <small>Treatment category</small>
                                        <strong id="booking-category-title-{{ Str::slug($category) }}">{{ $category }}</strong>
                                    </span>
                                    <span class="mohni-booking-group__count">{{ $services->count() }} {{ Str::plural('treatment', $services->count()) }}</span>
                                </header>
                                <div class="mohni-booking-group__body">
                                    @foreach ($services as $service)
                                        <label class="mohni-booking-service" data-booking-service data-search-text="{{ Str::lower($category . ' ' . $service['name']) }}">
                                            <input type="radio" name="service_variation_id" value="{{ $service['id'] }}" data-service-version="{{ $service['version'] }}" @if($preselectedService && $preselectedService['id'] === $service['id']) checked @endif>
                                            <span class="mohni-booking-service__marker" aria-hidden="true"></span>
                                            <span class="mohni-booking-service__copy">
                                                <strong>{{ $service['name'] }}</strong>
                                                @if ($service['duration_minutes'])
                                                    <small>{{ $service['duration_minutes'] }} min</small>
                                                @endif
                                            </span>
                                            <span class="mohni-booking-service__price">
                                                @if ($service['amount'] !== null)
                                                    ${{ number_format($service['amount'] / 100, 2) }}
                                                @else
                                                    Contact us
                                                @endif
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </section>
                        @endforeach
                    </div>

                    <div class="mohni-booking-selection" data-booking-selection @if(!$preselectedService) hidden @endif>
                        <div>
                            <small>Your treatment</small>
                            <strong data-booking-selection-name>{{ $preselectedService['name'] ?? '' }}</strong>
                        </div>
                        <button type="submit" class="mh-btn" data-loading-text="Loading live times…">See available times</button>
                    </div>
                </form>
                <p class="mohni-booking-no-results" data-booking-no-results hidden>No services match your search.</p>
            @endif
        </section>
    </div>
</main>
@endsection

@section('page_scripts')
<script src="/js/booking.js?v=1.5" defer></script>
@endsection
