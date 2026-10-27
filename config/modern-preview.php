<?php

return [
    'enabled' => env('MODERN_PREVIEW_ENABLED', false),
    'password_hash' => env('MODERN_PREVIEW_PASSWORD_HASH', '$2y$10$L71qnHVBwEnx4NXNFEE90e6Jm6H752u.5bUpxc77h2gSOYw7bpEme'),
    'duration' => (int) env('MODERN_PREVIEW_DURATION', 120),
    'path' => '/'.trim(env('MODERN_PREVIEW_PATH', 'modern'), '/'),
];
