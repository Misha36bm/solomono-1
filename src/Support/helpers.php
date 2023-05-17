<?php

use Solomono\Tz1\Models\{Product, Category};
use Solomono\Tz1\Database\Seeders\DatabaseSeeder;
use Solomono\Tz1\Database\Migrations\{CreateCategoriesTable, CreateProductsTable};

if (!function_exists('config')) {

    /**
     * This function for geting values from config file
     * 
     * @param string $key key/keys for search values in config file
     * @return mixed
     */
    function config(string $key)
    {
        $config = include __DIR__ . '/../config.php';

        $keys = explode('.', $key);

        $configData = $key;

        foreach ($keys as $key) {
            if (is_string($configData)) {
                $configData = $config[$key];
            } else {
                $configData = $configData[$key];
            }
        }


        return $configData;
    }
}

if (!function_exists('dd')) {

    /**
     * Dev function for "dump and die"
     * 
     * @return never
     */
    function dd(mixed ...$data)
    {
        echo '<pre>';
        if (count($data) == 1) {
            var_export(array_pop($data));
        } else {
            var_export($data);
        }
        echo '</pre>';
        die;
    }
}

if (!function_exists('run_migrations')) {
    function run_migrations()
    {
        CreateCategoriesTable::run();
        CreateProductsTable::run();
    }
}

if (!function_exists('run_seeder')) {
    function run_seeder()
    {
        DatabaseSeeder::run();
    }
}

if (!function_exists('get_product_model')) {
    function get_product_model()
    {
        return new Product();
    }
}

if (!function_exists('product_card_template')) {
    function product_card_template($product)
    {
        return "
        <div class=\"card-block mb-4 col-4\">
            <div class=\"card\">
                <div class=\"card-body text-center\">
                    <h5 class=\"card-title\">$product->name</h5>
                    <h6 class=\"card-subtitle mb-2 text-body-secondary\">$product->price</h6>
                    <p class=\"card-text\">$product->date</p>
                </div>
            </div>
        </div>
        ";
    }
}

if (!function_exists('get_category_model')) {
    function get_category_model()
    {
        return new Category();
    }
}
