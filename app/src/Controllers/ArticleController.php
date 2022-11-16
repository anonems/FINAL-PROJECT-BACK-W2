<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;

class ArticleController extends AbstractController
{


    public function home()
    {
        $manger = new ArticleManager(new PDOFactory());
        $articles = $manger->getAllArticles();

        $this->render("home.php", ["articles" => $articles], "Tous les articles");
    }
}
