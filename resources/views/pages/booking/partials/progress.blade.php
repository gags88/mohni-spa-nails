<ol class="mohni-booking-steps" aria-label="Booking progress">
    @foreach (['Service', 'Date & time', 'Your details', 'Review'] as $step => $label)
        @php $number = $step + 1; @endphp
        <li class="{{ $number === $currentStep ? 'is-current' : '' }} {{ $number < $currentStep ? 'is-complete' : '' }}">
            <span>{{ $number }}</span>{{ $label }}
        </li>
    @endforeach
</ol>
