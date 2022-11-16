<?php 

require_once "./vendor/autoload.php";

$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

switch ($url) {
    case "/":
        $controller = new \App\Controllers\ArticleController();
        $controller->home();
        break;

    default:
        throw new Exception("RIEN TROUVE !");
}