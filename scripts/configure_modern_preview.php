<?php

if ($argc !== 2) {
    fwrite(STDERR, "Usage: php configure_modern_preview.php <env-file>\n");
    exit(1);
}

[$script, $envPath] = $argv;

if (! is_file($envPath) || ! is_readable($envPath)) {
    fwrite(STDERR, "Environment file is missing or unreadable.\n");
    exit(1);
}

$contents = (string) file_get_contents($envPath);
$settings = [
    'APP_URL' => 'https://mohnispanails.com/modern',
    'MODERN_PREVIEW_ENABLED' => 'true',
    'MODERN_PREVIEW_DURATION' => '120',
    'MODERN_PREVIEW_PATH' => 'modern',
    'SESSION_COOKIE' => 'mohni_modern_preview_session',
    'SESSION_PATH' => '/modern',
    'SESSION_LIFETIME' => '120',
    'SESSION_SECURE_COOKIE' => 'true',
];

foreach ($settings as $key => $value) {
    $encodedValue = '"'.str_replace(
        ['\\', '"', "\r", "\n"],
        ['\\\\', '\\"', '', ''],
        $value
    ).'"';
    $line = $key.'='.$encodedValue;
    $pattern = '/^'.preg_quote($key, '/').'\s*=.*$/m';

    if (preg_match($pattern, $contents)) {
        $contents = preg_replace($pattern, $line, $contents);
    } else {
        $contents = rtrim($contents).PHP_EOL.$line.PHP_EOL;
    }
}

if (file_put_contents($envPath, $contents, LOCK_EX) === false) {
    fwrite(STDERR, "Unable to update the environment file.\n");
    exit(1);
}

echo "Modern preview environment configured.\n";
