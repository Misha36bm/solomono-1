<?php

namespace Solomono\Tz1\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DB
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connect()
    {
    }
}
