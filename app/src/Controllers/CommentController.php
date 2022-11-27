<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\CommentManager;
use App\Managers\UserManager;
use App\Managers\SessionManager;
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
        $sessionManager = new SessionManager();
        $content = filter_input(INPUT_POST, "contentComment");
        $id_article = $id;
        $id_parent_comment = filter_input(INPUT_POST, "id_parent_comment");
        $author = $sessionManager->getSessionUsername();
        $commentManager = new CommentManager(new PDOFactory());
        $id_c = filter_input(INPUT_POST, "comment_id");
        if($id_c){
            $commentManager->deleteComment($id_c);
        }
        if($content){
            $commentManager->creatComment($author, $content, $id_article, $id_parent_comment);
        }
        header("location: /article/" . $id );
        //$this->render("showOne.php", [], "Un article");
    }
    
}
