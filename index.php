<?php
require_once("./vendor/autoload.php");
use App\Routes\Router;

session_start();
$url = $_SERVER['REQUEST_URI'];
$controller = new Router();
echo $controller->route($url);