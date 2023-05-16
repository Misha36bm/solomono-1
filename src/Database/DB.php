<?php

namespace Solomono\Tz1\Database;


use Illuminate\Database\Capsule\Manager as Capsule;

class DB
{
    private static $instance;

    private $capsule;

    private function __construct()
    {
        $capsule = new Capsule();

        $capsule->addConnection(config('db-conncet'));

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $this->capsule = $capsule;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public static function table(string $tableName)
    {
        return self::getInstance()->capsule->table($tableName);
    }
}
