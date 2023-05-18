<div class="col-2 offset-1 d-flex justify-content-start flex-column">
    <select class="form-select text-center" id="category-select">
        <option selected disabled>Select category</option>
        <?php
        $categories = get_category_model()->getCategories();

        $categories->each(function ($category, $index) {
            $isActive = $_GET['changeCategory'] == $category->id ? 'selected' : '';

            echo '<option value="' . $category->id . '" ' . $isActive . '>' . $category->name . '</option>';
        });
        ?>
    </select>

    <select class="form-select mt-5 text-center" id="sort-by-select">
        <option value="lower_price" <?= $_GET['sortBy'] == 'lower_price' ? 'selected' : '' ?>>спочатку дешевші</option>
        <option value="name" <?= $_GET['sortBy'] == 'name' ? 'selected' : '' ?>>по алфавіту</option>
        <option value="date" <?= $_GET['sortBy'] == 'date' ? 'selected' : '' ?>>спочатку нові</option>
    </select>
</div>