<?php

return [
    'enabled' => env('MODERN_PREVIEW_ENABLED', false),
    'password_hash' => env('MODERN_PREVIEW_PASSWORD_HASH', '$2y$10$XqvD7SxVzzWHFOUN.PuozOjTlqapHSFfNdkptOmfVxnbZNw9j5r4q'),
    'duration' => (int) env('MODERN_PREVIEW_DURATION', 120),
    'path' => '/'.trim(env('MODERN_PREVIEW_PATH', 'modern'), '/'),
];
