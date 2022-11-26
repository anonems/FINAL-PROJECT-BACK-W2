<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\CommentManager;
use App\Managers\UserManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: "admin", methods: ["GET"])]
    public function admin()
    {

        $articleManager = new ArticleManager(new PDOFactory());

        $commentManager = new CommentManager(new PDOFactory());

        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();
        $username = $sessionManager->getSessionUsername();

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->readUser($username);

        if($logStatut && $user[0]->getRol() === "hight"){
            $articles = $articleManager->readAllArticles();
            $users = $userManager->readAllUser();
            $comments = $commentManager->readAllComments();
            $this->render("admin.php", ["users" => $users, "articles" => $articles, "comments" => $comments], "Admin page", $logStatut);
        }else{
            echo "<script type='text/javascript'>alert('To access admin space, ans try admin features (delete any comment, article and user), you need to login with test id.'); location.href='/login'</script>";
        }
    }
    
}
