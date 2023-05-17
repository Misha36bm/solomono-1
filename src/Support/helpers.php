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
                    <h6 class=\"btn btn-link mb-0\" data-bs-toggle=\"modal\" data-bs-target=\"#productModal$product->id\">Buy</h6>
                </div>
            </div>
        </div>

        <div class=\"modal fade\" id=\"productModal$product->id\" tabindex=\"-1\" aria-labelledby=\"productModal$product->id\Label\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h1 class=\"modal-title fs-5\" id=\"productModal$product->id\Label\">$product->name</h1>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body\">
                    <p>$product->price</p>
                    <p>$product->date</p>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                    <button type=\"button\" class=\"btn btn-primary\">Save changes</button>
                </div>
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

if (!function_exists('api')) {
    function api($action, $data)
    {
        $result = [];

        switch ($action) {
            case 'sortBy':
                switch ($data['selectedOption']) {
                    case 'name':
                        $products = Product::getProducts()->sortBy('name');
                        break;
                    case 'date':
                        $products = Product::getProducts()->sortBy('date')->reverse();
                        break;
                    case 'lower_price':
                        $products = Product::getProducts()->sortBy('price');
                        break;

                    default:
                        $products = Product::getProducts();
                        break;
                }
                
                foreach($products as $product){
                    array_push($result, product_card_template($product));
                }

                die(json_encode($result));
                break;

            default:
                # code...
                break;
        }

        return json_encode($result);
    }
}
