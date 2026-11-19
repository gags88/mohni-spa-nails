<aside class="mohni-booking-summary">
    <p class="mohni-eyebrow">Appointment summary</p>
    <h2>{{ $service['name'] }}</h2>
    <dl>
        <div><dt>Date</dt><dd>{{ $appointment['date_label'] }}</dd></div>
        <div><dt>Time</dt><dd>{{ $appointment['time_label'] }}</dd></div>
        <div><dt>With</dt><dd>{{ $appointment['team_member_name'] }}</dd></div>
        @if ($service['duration_minutes'])
            <div><dt>Duration</dt><dd>{{ $service['duration_minutes'] }} minutes</dd></div>
        @endif
        @if ($service['amount'] !== null)
            <div><dt>Price</dt><dd>${{ number_format($service['amount'] / 100, 2) }}</dd></div>
        @endif
    </dl>
</aside>
