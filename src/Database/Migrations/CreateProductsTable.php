<?php

namespace Solomono\Tz1\Database\Migrations;

use Solomono\Tz1\Database\DB;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable
{
    private static $schema;
    private static $table = 'products';

    public static function run()
    {
        self::setVariables();

        if (!self::$schema->hasTable(self::$table)) {
            self::$schema->create(self::$table, function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('category_id');
                $table->foreign('category_id')->references('id')->on('products');
                $table->string('name');
                $table->float('price');
                $table->date('date');
            });
        }
    }

    private static function setVariables()
    {
        self::$schema = DB::getCapsule()->schema();
    }
}
