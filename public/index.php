<?php

require __DIR__ . '/../vendor/autoload.php';

use Core\Router;

$router = new Router();

$router->post('/review', 'ReviewController@store');

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
