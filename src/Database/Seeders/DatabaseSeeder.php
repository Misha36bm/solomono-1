<?php

namespace Solomono\Tz1\Database\Seeders;


use Solomono\Tz1\Database\Seeders\{CategoriesSeeder, ProductsSeeder};

class DatabaseSeeder
{
    public static function run()
    {
        CategoriesSeeder::run();
        ProductsSeeder::run();
    }
}
