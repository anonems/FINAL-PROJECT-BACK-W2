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
        $id_parent_comment = filter_input(INPUT_POST, "id_parent_comment");
        $author = "test";//inserer l'utilisateur actuelle de la session.

        $commentManager = new CommentManager(new PDOFactory());
        $comments = $commentManager->addComment($author, $content, $id_article, $id_parent_comment);
        header("location: /article/" . $id );
        //$this->render("showOne.php", [], "Un article");
    }
    
}
