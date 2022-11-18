<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\UserManager;
use App\Routes\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        $manager = new ArticleManager(new PDOFactory());
        $articles = $manager->getAllArticles();

        $this->render("home.php", ["articles" => $articles], "Tous les articles");
    }

    /**
     * @param $id
     * @return void
     */
    #[Route('/article/{id}', name: "showOne", methods: ["GET"])]
    public function showOne($id)
    {
        $manager = new ArticleManager(new PDOFactory());
        $article = $manager->getOneArticle($id);
        echo $id;

        $this->render("showOne.php", ["article" => $article], "Un articles");
    }
}
