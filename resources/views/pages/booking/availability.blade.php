@extends('layout.booking')

@section('title', 'Choose a Time | ' . app_name())
@section('website_meta')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<main class="mohni-booking-app mohni-booking-app--availability">
    <div class="mohni-booking-app__frame">
        <header class="mohni-booking-app__header">
            <div class="mohni-booking-heading">
                <div>
                    <p class="mohni-eyebrow">Your appointment</p>
                    <h1 class="mohni-display">Choose a time that suits you.</h1>
                    <p>Select any available time below. Nothing is booked until you review and confirm.</p>
                </div>
                <div class="mohni-booking-live"><i></i> Live availability</div>
            </div>

            @include('pages.booking.partials.progress', ['currentStep' => 2])
        </header>

        <section class="mohni-booking-app__body">
            <div class="mohni-availability-layout">
                <aside class="mohni-availability-summary">
                    <a class="mohni-booking-back" href="{{ route('booking.index', [], false) }}">Change treatment</a>
                    <p class="mohni-eyebrow">Your treatment</p>
                    <h2>{{ $service['name'] }}</h2>
                    <dl>
                        @if ($service['duration_minutes'])
                            <div><dt>Duration</dt><dd>{{ $service['duration_minutes'] }} minutes</dd></div>
                        @endif
                        @if ($service['amount'] !== null)
                            <div><dt>Price</dt><dd>${{ number_format($service['amount'] / 100, 2) }}</dd></div>
                        @endif
                    </dl>
                    <p class="mohni-availability-summary__note">Select a time to continue. Nothing is booked until the final confirmation.</p>
                </aside>

                <div class="mohni-availability-calendar">
                    <div class="mohni-booking-week-nav">
                        <div>
                            <p class="mohni-eyebrow">Available appointments</p>
                            <h2>{{ $selectedDate->format('M j') }}–{{ $selectedDate->addDays(6)->format('M j, Y') }}</h2>
                        </div>
                        <div class="mohni-booking-week-nav__links">
                            @if ($previousDate)
                                <a href="{{ route('booking.availability', ['service_variation_id' => $service['id'], 'date' => $previousDate->format('Y-m-d')], false) }}">Previous</a>
                            @else
                                <span>Previous</span>
                            @endif
                            <a href="{{ route('booking.availability', ['service_variation_id' => $service['id'], 'date' => $nextDate->format('Y-m-d')], false) }}">Next 7 days</a>
                        </div>
                    </div>

                    @if ($slotsByDate->isEmpty())
                        <div class="mohni-booking-empty">
                            <h3>No times are available during these seven days.</h3>
                            <p>Try the next week or call us at <a href="tel:+12042194071">204-219-4071</a>.</p>
                        </div>
                    @else
                        <form method="GET" action="{{ route('booking.details', [], false) }}" data-booking-time-form>
                            <input type="hidden" name="service_variation_id" value="{{ $service['id'] }}">
                            <input type="hidden" name="start_at" data-booking-start-at>
                            <input type="hidden" name="team_member_id" data-booking-team-member-id>
                            <div class="mohni-booking-days">
                                @foreach ($slotsByDate as $slots)
                                    <section class="mohni-booking-day" data-booking-day>
                                        <h3>{{ $slots->first()['date_label'] }}</h3>
                                        <div class="mohni-booking-times">
                                            @foreach ($slots as $slot)
                                                <button class="mohni-booking-time" type="button" data-booking-time data-start-at="{{ $slot['start_at'] }}" data-team-member-id="{{ $slot['team_member_id'] }}" aria-pressed="false">
                                                    <strong>{{ $slot['time_label'] }}</strong>
                                                    <small>{{ $slot['team_member_name'] }}</small>
                                                </button>
                                            @endforeach
                                        </div>
                                    </section>
                                @endforeach
                            </div>

                            <div class="mohni-booking-selection mohni-booking-time-selection" data-booking-time-selection hidden>
                                <div>
                                    <small>Selected appointment</small>
                                    <strong data-booking-time-selection-label></strong>
                                </div>
                                <button type="submit" class="mh-btn">Continue</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@section('page_scripts')
<script src="/js/booking-availability.js?v=1.1" defer></script>
@endsection
