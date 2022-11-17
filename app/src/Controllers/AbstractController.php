<?php

namespace App\Controllers;

abstract class AbstractController
{

    public function __construct(string $action, array $params = [])
    {
        if (!is_callable([$this, $action])) {
           throw new \RuntimeException("La methode $action n'est pas disponible dans ce controller");
        }
        call_user_func_array([$this, $action], $params);
    }
    
    public function render(string $view, array $args = [], string $title = "Document")
    {
        $view = dirname(__DIR__, 2) . '/views/' . $view;
        $base = dirname(__DIR__, 2) . '/views/base.php';

        ob_start();
        foreach ($args as $key => $value) {
            $$key = $value;
        }

        require_once $view;
        $_pageContent = ob_get_clean();
        $_pageTitle = $title;

        require_once $base;

        exit;
    }
}
