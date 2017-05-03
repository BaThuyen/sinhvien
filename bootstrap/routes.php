<?php

$basePath = explode('/' , $_SERVER['SCRIPT_NAME']);

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/')) ;
$uri = array_diff($uri, ['']);

$routes = array_values(array_diff($uri, $basePath));
$routes = array_map('trim', $routes);