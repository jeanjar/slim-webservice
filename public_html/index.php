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
 * Middleware de autenticação
 */
$app->add(new Middleware\Authentication($settings['authenticated_routes']));

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

$app->get('/', function() use ($db) {
    var_dump($db->getInstance());
    echo JsonResponse::dump(Slim::getInstance()->request()->get());
});

$app->run();