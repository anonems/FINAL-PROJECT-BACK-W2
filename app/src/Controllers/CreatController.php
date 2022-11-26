<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class CreatController extends AbstractController
{

    #[Route('/creat', name: "crud", methods: ["POST"])]
    public function creat_post()
    {
        $articleManager = new ArticleManager(new PDOFactory());
        $sessionManager = new SessionManager();

        $username = $sessionManager->getSessionUsername();

        $title = filter_input(INPUT_POST, "title");
        $content = filter_input(INPUT_POST, "content");
        $category = filter_input(INPUT_POST, "category");
        $illustration = filter_input(INPUT_POST, "illustration");
        $descript = filter_input(INPUT_POST, "descript");
        $getArticle = $articleManager->readOneArticleFromTitle($title);

        if(!$getArticle){
            $articleManager->creatArticle($username, $title, $content, $category, $illustration, $descript);
            header('location: /');
        }else{
            echo "<script type='text/javascript'>alert('Title already use, please choice an other.'); </script>";
        }
    }

}
