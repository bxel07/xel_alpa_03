<?php
require_once __DIR__.'/../vendor/autoload.php';
use xel\framework\Devise\Router;
use xel\framework\Middleware\Authmiddleware;

//register autoloader
new xel\framework\Helper\Boostrapclass();

// adding router
Router::add("GET",'/product',\xel\framework\Service\Product::class,'categories');
Router::add('GET','/',\xel\framework\Service\HomeController::class,'index', [Authmiddleware::class]);
Router::add('POST','/post',\xel\framework\Service\HomeController::class,'hello');
Router::add("POST",'/products',\xel\framework\Service\Product::class,'create');

Router::run(); 