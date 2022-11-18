<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\CommentManager;
use App\Managers\UserManager;
use App\Routes\Route;

class CommentController extends AbstractController
{
    /**
     * @param $id
     * @return void
     */
    #[Route('/article/{id}', name: "showOne", methods: ["POST"])]
    public function addComment($id)
    {

        $contentComment = filter_input(INPUT_POST, "contentComent");
        $articleId = $id;

        $commentManager = new CommentManager(new PDOFactory());
        $comments = $commentManager->setComment($articleId, $contentComment);

        //$this->render("showOne.php", ["article" => $article, "comments" => $comments], "Un articles");
    }
    
}
