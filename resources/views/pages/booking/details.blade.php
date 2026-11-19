@extends('layout.booking')

@section('title', 'Your Details | ' . app_name())
@section('website_meta')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<main class="mohni-booking-app">
    <div class="mohni-booking-app__frame">
        <header class="mohni-booking-app__header">
            <div class="mohni-booking-heading">
                <div>
                    <p class="mohni-eyebrow">Almost there</p>
                    <h1 class="mohni-display">Tell us about you.</h1>
                    <p>Your details are used only to prepare this appointment preview.</p>
                </div>
                <div class="mohni-booking-live"><i></i> Secure preview</div>
            </div>
            @include('pages.booking.partials.progress', ['currentStep' => 3])
        </header>

        <section class="mohni-booking-app__body mohni-booking-layout">
            <form class="mohni-booking-details" method="POST" action="{{ route('booking.review', [], false) }}" data-booking-loading-form>
                @csrf
                <input type="hidden" name="service_variation_id" value="{{ $service['id'] }}">
                <input type="hidden" name="start_at" value="{{ $appointment['start_at'] }}">
                <input type="hidden" name="team_member_id" value="{{ $appointment['team_member_id'] }}">

                <div class="mohni-booking-form-heading">
                    <p class="mohni-eyebrow">Contact details</p>
                    <h2>Who is this appointment for?</h2>
                </div>

                <div class="mohni-booking-fields">
                    <label class="mohni-booking-field mohni-booking-field--wide">
                        <span>Full name</span>
                        <input type="text" name="customer_name" value="{{ old('customer_name', $customer['name'] ?? '') }}" autocomplete="name" required>
                        @error('customer_name')<small>{{ $message }}</small>@enderror
                    </label>
                    <label class="mohni-booking-field">
                        <span>Email</span>
                        <input type="email" name="email" value="{{ old('email', $customer['email'] ?? '') }}" autocomplete="email" required>
                        @error('email')<small>{{ $message }}</small>@enderror
                    </label>
                    <label class="mohni-booking-field">
                        <span>Phone</span>
                        <input type="tel" name="phone" value="{{ old('phone', $customer['phone'] ?? '') }}" autocomplete="tel" required>
                        @error('phone')<small>{{ $message }}</small>@enderror
                    </label>
                    <label class="mohni-booking-field mohni-booking-field--wide">
                        <span>Anything we should know? <em>Optional</em></span>
                        <textarea name="notes" rows="6">{{ old('notes', $customer['notes'] ?? '') }}</textarea>
                        @error('notes')<small>{{ $message }}</small>@enderror
                    </label>
                </div>

                <div class="mohni-booking-form-actions">
                    <a class="mohni-booking-secondary" href="{{ route('booking.availability', ['service_variation_id' => $service['id'], 'date' => $appointment['date_key']], false) }}" data-booking-loading-link data-loading-text="Opening times…">&larr; Back to date &amp; time</a>
                    <button class="mh-btn mohni-booking-primary" type="submit" data-loading-text="Preparing review…">Review appointment</button>
                </div>
            </form>

            @include('pages.booking.partials.summary', ['service' => $service, 'appointment' => $appointment])
        </section>
    </div>
</main>
@endsection
