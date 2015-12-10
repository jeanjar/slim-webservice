<?php

class Database
{
    /**
     * @property PDO $instances
     */
    public static $instances = [];

    /**
     * @property Array $args
     */
    private $args;

    public function __construct($args)
    {
        $this->args = $args;
    }

    public function getInstance($name = 'default', $reconnect = false)
    {
        if($reconnect)
        {
            if(isset(self::$instances[$name]))
                self::$instances[$name] = null;
        }

        if(!isset(self::$instances[$name]) or !is_a(self::$instances[$name], PDO::class))
        {
            try
            {
                if(!isset($this->args[$name]))
                {
                    throw new Exception("Configurações para a base \"{$name}\" inválidas");
                }
                self::$instances[$name] = new PDO($this->args[$name]['dsn'], $this->args[$name]['user'], $this->args[$name]['pass'],[
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]);
            }
            catch(Exception $ex)
            {
                if(\Slim\Slim::getInstance()->getMode() == ENV_DEV)
                    die($ex->getMessage());
                else
                    die("Não foi possível conectar ao banco de dados");
            }

        }

        return self::$instances[$name];
    }


}