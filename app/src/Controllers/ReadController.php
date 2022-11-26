<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class ReadController extends AbstractController
{

    #[Route('/read', name: "crud", methods: ["GET"])]
    public function read()
    {
        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        $articleManager = new ArticleManager(new PDOFactory());
        $articles = $articleManager->readAllArticles();

        $this->render("home.php", ["articles" => $articles], "Tous les articles", $logStatut);       
    }

}
