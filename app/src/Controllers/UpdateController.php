<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class UpdateController extends AbstractController
{

    #[Route('/update', name: "update", methods: ["POST"])]
    public function update()
    {

        $id = filter_input(INPUT_POST, "choice");

        $articleManager = new ArticleManager(new PDOFactory());
        $article = $articleManager->readOneArticle($id);

        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        $this->render("updateOne.php", ["article" => $article, "article_id" => $id], "Update one article", $logStatut);
        
    }

    #[Route('/updateOne/{id}', name: "update", methods: ["POST"])]
    public function updateOne($id)
    {
        $sessionManager = new SessionManager();
        $username = $sessionManager->getSessionUsername();

        $title = filter_input(INPUT_POST, "title");
        $content = filter_input(INPUT_POST, "content");
        $category = filter_input(INPUT_POST, "category");
        $illustration = filter_input(INPUT_POST, "illustration");
        $descript = filter_input(INPUT_POST, "descript");
        $statut = filter_input(INPUT_POST, "statut");
        
        $articleManager = new ArticleManager(new PDOFactory());

        $articleManager->updateArticle($id, $username, $title, $content, $category, $illustration, $descript, $statut);
        
        header('location: /');
    }


}
