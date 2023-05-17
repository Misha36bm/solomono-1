<?php

require_once  __DIR__ . '/vendor/autoload.php';

if ($_GET['action'] && $_POST['data']) {
    api($_GET['action'], $_POST['data']);

    die;
}


run_migrations();
run_seeder();

require_once __DIR__ . '/src/views/index.php';