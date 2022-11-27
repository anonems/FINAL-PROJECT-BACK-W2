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

        if($logStatut){
            $user = $userManager->readUser($username);
            if($user[0]->getRol() === "hight"){
                $articles = $articleManager->readAllArticles();
                $users = $userManager->readAllUser();
                $comments = $commentManager->readAllComments();
                $this->render("admin.php", ["users" => $users, "articles" => $articles, "comments" => $comments, "sessionUsername" => $username], "Admin page", $logStatut);
            }else{
                echo "<script type='text/javascript'>alert('To access admin space, ans try admin features (delete any comment, article and user), you need to login with test id.'); location.href='/login'</script>";
            }
        }else{
            header('location: /');
        }
        
    }

    #[Route('/admin', name: "adminDelete", methods: ["POST"])]
    public function adminDelete()
    {
        $sessionManager = new SessionManager();

        $logStatut = $sessionManager->check_login();
        $username = $sessionManager->getSessionUsername();

        $userManager = new UserManager(new PDOFactory());
        $articleManager = new ArticleManager(new PDOFactory());
        $commentManager = new CommentManager(new PDOFactory());

        $user = $userManager->readUser($username);

        $id_u = filter_input(INPUT_POST, "user_id");
        $id_a = filter_input(INPUT_POST, "article_id");
        $id_c = filter_input(INPUT_POST, "comment_id");

        if($logStatut && $user[0]->getRol() === "hight"){
            if($id_c){
                $commentManager->deleteComment($id_c);
            }elseif($id_a){
                $articleManager->deleteArticle($id_a);
            }elseif($id_u){
                $userManager->deleteUser($id_u);
            }
            header("location: /admin");        
        }else{
                echo "<script type='text/javascript'>alert('To access admin space, ans try admin features (delete any comment, article and user), you need to login with test id.'); location.href='/login'</script>";
            }
    }
    
}
