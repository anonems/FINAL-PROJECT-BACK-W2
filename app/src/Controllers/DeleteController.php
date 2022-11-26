<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\CommentManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class DeleteController extends AbstractController
{

    #[Route('/delete', name: "delete", methods: ["POST"])]
    public function delete()
    {
        $id = filter_input(INPUT_POST, "choice");


        $articleManager = new ArticleManager(new PDOFactory());
        $articleManager->deleteArticle($id);

        $commentManager = new CommentManager(new PDOFactory());
        $commentManager->deleteCommentFromArticle($id);

        header('location: /');

        

    }

}
