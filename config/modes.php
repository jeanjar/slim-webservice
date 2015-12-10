<?php

$app->configureMode(ENV_PROD, function () use ($app) {
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});

$app->configureMode(ENV_DEV, function () use ($app) {
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});