<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\UserManager;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class CrudController extends AbstractController
{
    #[Route('/crud', name: "crud", methods: ["GET"])]
    public function crud()
    {
        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        if($logStatut){
            $this->render("crud.php", [], "CRUD page", $logStatut);
        }else{
            $this->render("login.php", [], "Login page", $logStatut);
        }

    }

    #[Route('/crud', name: "crud", methods: ["POST"])]
    public function crud_form()
    {
        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        if($logStatut){
        
            if(isset($_POST['create_bt'])) {
                $this->render("creat.php", [], "Post an article.", $logStatut);
            }
            else if(isset($_POST['read_bt'])) {
                header('location: /read');
                // $articleManager = new ArticleManager(new PDOFactory());
                // $articles = $articleManager->readAllArticles();
                // $this->render("home.php", [["articles" => $articles]], "All article.", $logStatut);
            }
            else if(isset($_POST['update_bt'])) {
                $this->render("update.php", [], "Update an article.", $logStatut);
            }
            else if(isset($_POST['delete_bt'])) {
                $this->render("delete.php", [], "Delete page.", $logStatut);
            }

        }
        else{
            $this->render("login.php", [], "Login page", $logStatut);
        }

    }

}
