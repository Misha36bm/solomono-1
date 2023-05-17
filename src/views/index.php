<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once(__DIR__ . '/partials/styles.php'); ?>

    <title>Document</title>
</head>

<body>
    <main class="container-fluid g-0 py-5">
        <div class="row">
            <?php require_once(__DIR__ . '/partials/aside-menu.html');?>

            <?php require_once(__DIR__ . '/partials/products.html');?>
        </div>
    </main>

    <?php require_once(__DIR__ . '/partials/scripts.php'); ?>
</body>

</html>