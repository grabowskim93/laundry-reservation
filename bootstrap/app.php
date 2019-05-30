<?php

use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/settings.php';
$app = new App($settings);

$dependencies = require __DIR__ . '/dependencies.php';
$dependencies($app);

$routes = require __DIR__ . '/routes.php';
$routes($app);
