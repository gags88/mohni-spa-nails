@extends('layout.booking')

@section('title', 'Review Appointment | ' . app_name())
@section('website_meta')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<main class="mohni-booking-app">
    <div class="mohni-booking-app__frame">
        <header class="mohni-booking-app__header">
            <div class="mohni-booking-heading">
                <div>
                    <p class="mohni-eyebrow">Final review</p>
                    <h1 class="mohni-display">Review your appointment.</h1>
                    <p>Check everything below. This preview does not create an appointment in Square.</p>
                </div>
                <div class="mohni-booking-preview-badge">Preview only</div>
            </div>
            @include('pages.booking.partials.progress', ['currentStep' => 4])
        </header>

        <section class="mohni-booking-app__body mohni-booking-layout">
            <div class="mohni-booking-review-card">
                <div class="mohni-booking-form-heading">
                    <p class="mohni-eyebrow">Your information</p>
                    <h2>{{ $customer['name'] }}</h2>
                </div>
                <dl class="mohni-booking-review-list">
                    <div><dt>Email</dt><dd>{{ $customer['email'] }}</dd></div>
                    <div><dt>Phone</dt><dd>{{ $customer['phone'] }}</dd></div>
                    @if ($customer['notes'])
                        <div><dt>Notes</dt><dd>{{ $customer['notes'] }}</dd></div>
                    @endif
                </dl>

                <div class="mohni-booking-preview-notice">
                    <strong>Nothing has been submitted.</strong>
                    <p>The final Square booking action is intentionally disabled while we review and test the complete experience.</p>
                </div>

                <div class="mohni-booking-review-actions">
                    <a
                        class="mohni-booking-secondary"
                        href="{{ route('booking.details', ['service_variation_id' => $service['id'], 'start_at' => $appointment['start_at'], 'team_member_id' => $appointment['team_member_id']], false) }}"
                        data-booking-loading-link
                        data-loading-text="Opening details…"
                    >&larr; Edit details</a>
                    <button type="button" class="mh-btn" disabled>Confirm booking</button>
                </div>
            </div>

            @include('pages.booking.partials.summary', ['service' => $service, 'appointment' => $appointment])
        </section>
    </div>
</main>
@endsection
