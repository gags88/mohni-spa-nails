(function () {
    'use strict';

    function showLoading(element) {
        if (!element || element.classList.contains('is-loading')) {
            return;
        }

        var spinner = document.createElement('span');
        var label = document.createElement('span');

        spinner.className = 'mohni-booking-loader';
        spinner.setAttribute('aria-hidden', 'true');
        label.textContent = element.getAttribute('data-loading-text') || 'Loading…';

        element.classList.add('is-loading');
        element.setAttribute('aria-busy', 'true');
        element.textContent = '';
        element.appendChild(spinner);
        element.appendChild(label);

        if (element.tagName === 'BUTTON') {
            element.disabled = true;
        }
    }

    document.querySelectorAll('[data-booking-loading-form]').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            showLoading(event.submitter || form.querySelector('button[type="submit"]'));
        });
    });

    document.querySelectorAll('[data-booking-loading-link]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
                return;
            }

            showLoading(link);
        });
    });
}());
