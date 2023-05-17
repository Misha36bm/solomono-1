<?php

namespace Solomono\Tz1\Models;

use Solomono\Tz1\Database\DB;

class Product
{
    protected static string $tableName = 'products';
    protected static $table;

    public function __construct()
    {
        self::$table = self::getTable();
    }

    public static function getTable()
    {
        return DB::table(self::$tableName);
    }

    public static function getProducts()
    {
        return self::getTable()->get();
    }
}
