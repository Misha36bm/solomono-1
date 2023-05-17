<div class="col-2 offset-1 d-flex justify-content-start flex-column">
    <select class="form-select text-center" id="category-select">
        <option selected>Select category</option>
        <?php
            $categories = get_category_model()->getCategories();

            $categories->each(function ($category, $index) {
                $isActive = false ? 'selected' : '';

                echo '<option value="' . $category->id . '" ' . $isActive . '>' . $category->name . '</option>';
            });
        ?>
    </select>

    <select class="form-select mt-5 text-center" id="sort-by-select">
        <option value="lower_price">спочатку дешевші</option>
        <option value="name">по алфавіту</option>
        <option value="date">спочатку нові</option>
    </select>
</div>