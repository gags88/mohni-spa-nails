@extends('layout.booking')

@section('title', 'Booking Temporarily Unavailable | ' . app_name())

@section('content')
<main class="mohni-booking">
    <section class="mohni-booking-hero">
        <div class="container">
            <p class="mohni-eyebrow">Appointments</p>
            <h1 class="mohni-display">We would love to help you book.</h1>
            <p>Online booking is temporarily unavailable. Please call <a href="tel:+12042194071">204-219-4071</a> or use our existing booking page.</p>
            <a class="mh-btn" href="{{ config('services.booking.url') }}">Open Square booking</a>
        </div>
    </section>
</main>
@endsection
