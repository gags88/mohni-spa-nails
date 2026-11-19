(function () {
    'use strict';

    var times = document.querySelectorAll('[data-booking-time]');
    var selection = document.querySelector('[data-booking-time-selection]');
    var label = document.querySelector('[data-booking-time-selection-label]');
    var startAt = document.querySelector('[data-booking-start-at]');
    var teamMemberId = document.querySelector('[data-booking-team-member-id]');

    if (!times.length || !selection || !label) {
        return;
    }

    times.forEach(function (time) {
        time.addEventListener('click', function () {
            times.forEach(function (otherTime) {
                var selected = otherTime === time;
                otherTime.classList.toggle('is-selected', selected);
                otherTime.setAttribute('aria-pressed', selected ? 'true' : 'false');
            });

            var day = time.closest('[data-booking-day]');
            var dayHeading = day ? day.querySelector('h3') : null;
            var timeHeading = time.querySelector('strong');
            label.textContent = (dayHeading ? dayHeading.textContent + ' at ' : '') + (timeHeading ? timeHeading.textContent : 'Selected time');
            startAt.value = time.getAttribute('data-start-at') || '';
            teamMemberId.value = time.getAttribute('data-team-member-id') || '';
            selection.hidden = false;
            selection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    });
}());
