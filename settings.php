<?php

$local_settings = include_once 'local-settings.php';

$settings = [
    'db' => [
        'default' => [
            'dsn' => 'pgsql:host=HOST;dbname=DB_NAME',
            'user' => 'DB_USER',
            'pass' => 'DB_PASS',
        ],
    ],
    'environment' => ENV_DEV,
];

return Nette\Utils\Arrays::mergeTree($local_settings, $settings);