<div class="col-7 offset-1">
    <?php
        $products = get_product_model()->getProducts();
        $product = $products->first();
    ?>

    <div class="row d-flex justify-content-between">
        <?php
            foreach ($products as $product) {
                echo product_card_template($product);
            }
        ?>
    </div>
</div>