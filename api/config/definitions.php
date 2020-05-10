<?php
declare(strict_types=1);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

return [
    'config' => [
        'debug' => (bool) getenv('APP_ENV_DEV')
    ],
];