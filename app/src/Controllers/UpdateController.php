<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class UpdateController extends AbstractController
{

    #[Route('/update', name: "update", methods: ["GET"])]
    public function update()
    {
        $articleManager = new ArticleManager(new PDOFactory());
        $articles = $articleManager->readAllArticles();

        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        $this->render("update.php", ["articles" => $articles], "Tous les articles", $logStatut);
        
    }


}
