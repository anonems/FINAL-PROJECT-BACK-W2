<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\UserManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class UserController extends AbstractController
{
    #[Route('/login', name: "login", methods: ["GET"])]
    public function login()
    {
        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        $this->render("login.php", [], "Login page", $logStatut);
    }

    #[Route('/login', name: "login", methods: ["POST"])]
    public function signin()
    {
        $username = filter_input(INPUT_POST, "username");
        $pwd = filter_input(INPUT_POST, "pwd");
        $pwd_hash =  password_hash($pwd, PASSWORD_DEFAULT);

        $userManager = new UserManager(new PDOFactory());
        $sessionManager = new SessionManager();

        $signin = filter_input(INPUT_POST, "signin");
        $login = filter_input(INPUT_POST, "login");
        $resmdp = filter_input(INPUT_POST, "resmdp");

        if($signin){
            if($userManager->readUser($username)){
                echo "<script type='text/javascript'>alert('this pseudo already use, please choice an other.'); location.href='/login'</script>";
                //var_dump($userManager->readUser($username));
            }else{
                $userManager->creatUser($username, $pwd_hash);
                header("location: /login" );
            }
        }
        if($login){
            if (password_verify($pwd, $getUser->getPwd())){
                $sessionManager->login($username);
                header("location: /crud" );
            }
            else{
                header("location: /login" );
                return false;
            }
        }
        if($resmdp){
            $userManager->updatePwd($username, $pwd);
            header("location: /login" );

        }

    }

}
