<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'booking' => [
        'url' => env('SQUARE_BOOKING_URL', 'https://book.squareup.com/appointments/shyx8cf9hexrvs/location/LDNGWM2MCEDEJ/services'),
    ],

    'square' => [
        'enabled' => env('SQUARE_BOOKING_ENABLED', false),
        'payments_enabled' => env('SQUARE_PAYMENT_ENABLED', false),
        'environment' => env('SQUARE_ENVIRONMENT', 'production'),
        'access_token' => env('SQUARE_ACCESS_TOKEN'),
        'application_id' => env('SQUARE_APPLICATION_ID'),
        'location_id' => env('SQUARE_LOCATION_ID'),
        'bookings_environment' => env('SQUARE_BOOKINGS_ENVIRONMENT', 'production'),
        'bookings_access_token' => env('SQUARE_BOOKINGS_ACCESS_TOKEN'),
        'bookings_location_id' => env('SQUARE_BOOKINGS_LOCATION_ID', 'LDNGWM2MCEDEJ'),
        'bookings_read_only' => env('SQUARE_BOOKINGS_READ_ONLY', true),
        'bookings_timezone' => env('SQUARE_BOOKINGS_TIMEZONE', 'America/Winnipeg'),
        'currency' => env('SQUARE_CURRENCY', 'CAD'),
        'api_version' => env('SQUARE_API_VERSION', '2026-11-18'),
    ],

];
