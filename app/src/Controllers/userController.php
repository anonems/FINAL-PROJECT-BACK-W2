<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\UserManager;
use App\Routes\Route;

class UserController extends AbstractController
{
    #[Route('/login', name: "login", methods: ["GET"])]
    public function login()
    {
        $this->render("login.php", [], "Login page");
    }

    #[Route('/login', name: "login", methods: ["POST"])]
    public function signin()
    {
        $username = filter_input(INPUT_POST, "username");
        $pwd = filter_input(INPUT_POST, "pwd");
        $pwd_hash =  password_hash($pwd, PASSWORD_DEFAULT);
        $userManager = new UserManager(new PDOFactory());
        $getUser = $userManager->readUser($username);
        $signin = filter_input(INPUT_POST, "signin");
        $login = filter_input(INPUT_POST, "login");
        $resmdp = filter_input(INPUT_POST, "resmdp");

        if($signin){
            if($getUser->getUsername()){
                //echo "error";
                return true;
            }else{
                $userManager->creatUser($username, $pwd_hash);
            }
            header("location: /login" );
        }
        if($login){
            if (password_verify($pwd, $getUser->getPwd())){
                header("location: /crud" );
                return true;
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
