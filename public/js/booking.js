(function () {
    'use strict';

    var search = document.querySelector('[data-booking-search]');
    var form = document.querySelector('[data-booking-services-form]');
    var selection = document.querySelector('[data-booking-selection]');
    var selectionName = document.querySelector('[data-booking-selection-name]');
    var noResults = document.querySelector('[data-booking-no-results]');
    var categoryButtons = document.querySelectorAll('[data-booking-category-target]');

    if (!form) {
        return;
    }

    form.addEventListener('change', function (event) {
        if (!event.target.matches('input[name="service_variation_id"]')) {
            return;
        }

        var service = event.target.closest('[data-booking-service]');
        var name = service.querySelector('.mohni-booking-service__copy strong');
        selectionName.textContent = name ? name.textContent : 'Selected service';
        selection.hidden = false;
    });

    form.addEventListener('submit', function () {
        var button = form.querySelector('button[type="submit"]');
        if (!button) {
            return;
        }

        button.disabled = true;
        button.textContent = 'Loading live times…';
    });

    categoryButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var group = document.getElementById(button.getAttribute('data-booking-category-target'));
            if (!group) {
                return;
            }

            categoryButtons.forEach(function (otherButton) {
                otherButton.classList.toggle('is-active', otherButton === button);
            });

            group.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    if (!search) {
        return;
    }

    search.addEventListener('input', function () {
        var query = search.value.trim().toLowerCase();
        var visibleCount = 0;

        document.querySelectorAll('[data-booking-group]').forEach(function (group) {
            var groupCount = 0;

            group.querySelectorAll('[data-booking-service]').forEach(function (service) {
                var matches = query === '' || service.getAttribute('data-search-text').indexOf(query) !== -1;
                service.hidden = !matches;
                groupCount += matches ? 1 : 0;
            });

            group.hidden = groupCount === 0;
            visibleCount += groupCount;
        });

        noResults.hidden = visibleCount !== 0;
    });

    if (search.value.trim() !== '') {
        search.dispatchEvent(new Event('input'));
    }
}());
