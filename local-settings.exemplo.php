<?php

return
    [
        'db' => [
            'default' => [
                'dsn' => 'pgsql:host=HOST;dbname=DB',
                'user' => 'USER',
                'pass' => 'PASSWORD'
            ],
        ],
        'authenticated_routes' => [
            '/minha/rota/autenticada'
        ],
        'environment' => ENV_DEV
    ];