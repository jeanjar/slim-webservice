<?php

return
    [
        'db' => [
            'default' => [
                'dsn' => 'pgsql:host=HOST;dbname=DB',
                'user' => 'USER',
                'pass' => 'PASSWORD',
            ],
        ],
        'environment' => ENV_DEV,
    ];