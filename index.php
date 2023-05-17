<?php

require_once  __DIR__ . '/vendor/autoload.php';

run_migrations();
run_seeder();

require_once __DIR__ . '/src/views/index.php';