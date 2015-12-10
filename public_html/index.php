<?php

require '../vendor/autoload.php';
use Slim\Slim;
use Helper\JsonResponse;

DEFINE("ENV_PROD" , 'production');
DEFINE("ENV_DEV" , 'development');

$settings = include '../settings.php';

$app = new Slim([
    'mode' => $settings['environment'],
]);

/**
 * Configurações
 */
include implode(DIRECTORY_SEPARATOR,[dirname(__DIR__), 'config', 'db.php']);
include implode(DIRECTORY_SEPARATOR,[dirname(__DIR__), 'config', 'modes.php']);
/**
 *
 */

/**
 * Rotas
 */
include implode(DIRECTORY_SEPARATOR,[dirname(__DIR__), 'routes', 'exemple.php']);
/**
 *
 */

$app->get('/', function() {
    echo JsonResponse::dump(Slim::getInstance()->request()->get());
});

$app->run();