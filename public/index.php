<?php

require dirname(__DIR__) . '/vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

// Add the routes
$router->add('todos', ['controller' => 'TodoController', 'action' => 'index', 'method' => 'GET']);
$router->add('todos/create', ['controller' => 'TodoController', 'action' => 'create', 'method' => 'GET']);
$router->add('todos', ['controller' => 'TodoController', 'action' => 'store', 'method' => 'POST']);

$router->dispatch($_SERVER['QUERY_STRING']);
