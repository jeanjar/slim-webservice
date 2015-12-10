<?php

use Helper\JsonResponse;
use Slim\Slim;


$app->get('/teste/', function(){
    var_dump(Slim::getInstance()->request->get());
    var_dump(Slim::getInstance()->db->getInstance()->query('select * from usuario')->fetchAll());
});
