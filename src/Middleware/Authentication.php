<?php

namespace Middleware;

use \Nette\Utils\Arrays as A;

class Authentication extends \Slim\Middleware
{
    private $rotasAutenticadas;

    public function __construct($rotasAutenticadas = [])
    {
        $this->rotasAutenticadas = $rotasAutenticadas;
    }

    public function call()
    {
        $this->app->hook('slim.before.dispatch' , array($this, 'authenticationMethod'));
        $this->next->call();
    }

    public function authenticationMethod()
    {
        if(in_array($this->app->request->getPathInfo(), $this->rotasAutenticadas))
        {
            /**
             * $_REQUEST
             */
            var_dump($this->app->request->params());
            //implementação da autenticação
        }
    }
}