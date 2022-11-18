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
    public function setComment($id)
    {

        $content = filter_input(INPUT_POST, "contentComment");
        $id_article = $id;
        $id_parent_comment = 1;
        $author = "test";

        $commentManager = new CommentManager(new PDOFactory());
        $comments = $commentManager->addComment($author, $content, $id_article);
        $commentChild = $commentManager->addChildComment($author, $content, $id_article, $id_parent_comment);
        $this->render("showOne.php", [ ], "Un articles");
    }

   /**
     * @param $id
     * @return void
     */
    #[Route('/article/{id}', name: "showOne", methods: ["GET"])]
    public function showOne($id)
    {
        $commentManager = new CommentManager(new PDOFactory());
        $comments = $commentManager->getAllComment($id);
        $childComments = $commentManager->getAllChildComment($id, $id_parent_comment);
        $this->render("showOne.php", ["comments" => $comments, "childComments" => $childComments], "Un articles");
    }
    
}
