<?php

namespace Helper;

use Nette\Utils\Json as J;
use Slim\Slim;

class JsonResponse
{
    public static function dump($dump)
    {
        $app = Slim::getInstance();
        if($app->settings['debug'])
        {
            $app->response()->header('Content-Type', 'charset=utf-8');
            ob_start();
            var_dump($dump);
            return ob_get_clean();
        }
        else
        {
            $app->response()->header('Content-Type', 'charset=utf-8;application/json');
            return J::encode($dump);
        }
    }
}
