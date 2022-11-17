<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\UserManager;
use App\Routes\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        $manger = new ArticleManager(new PDOFactory());
        $articles = $manger->getAllArticles();

        $this->render("home.php", [
            "articles" => $articles,
            "trucs" => "je suis une string",
            "machin" => 42
        ], "Tous les articles");
    }

    // /**
    //  * @param $id
    //  * @param $truc
    //  * @param $machin
    //  * @return void
    //  */
    // #[Route('/article/{id}/{truc}/{machin}', name: "francis", methods: ["GET"])]
    // public function showOne($id, $truc, $machin)
    // {
    //     var_dump($id, $truc);
    // }
}
