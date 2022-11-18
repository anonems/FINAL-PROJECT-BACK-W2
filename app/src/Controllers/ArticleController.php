<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\CommentManager;
use App\Managers\UserManager;
use App\Routes\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        $articleManager = new ArticleManager(new PDOFactory());
        $articles = $articleManager->getAllArticles();

        $this->render("home.php", ["articles" => $articles], "Tous les articles");
    }

    /**
     * @param $id
     * @return void
     */
    #[Route('/article/{id}', name: "showOne", methods: ["GET"])]
    public function showOne($id)
    {
        $articleManager = new ArticleManager(new PDOFactory());
        $commentManager = new CommentManager(new PDOFactory());
        $article = $articleManager->getOneArticle($id);
        $comments = $commentManager->getAllComment($id);
        $this->render("showOne.php", ["article" => $article, "comments" => $comments], "Un articles");
    }
    
}
