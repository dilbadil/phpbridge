<?php 

require_once '../vendor/autoload.php';
\Suggestotron\Config::setDirectory('../config');

$route = null;

if (isset($_SERVER['PATH_INFO']))
    $route = $_SERVER['PATH_INFO'];

$router = new \Suggestotron\Router();
$router->start($route);
