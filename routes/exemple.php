<?php

use Helper\JsonResponse;
use Slim\Slim;


$app->get('/teste/', function() use ($db) {
    var_dump(Slim::getInstance()->request->get());
    var_dump($db->getInstance()->query('select * from usuario')->fetchAll());
});
