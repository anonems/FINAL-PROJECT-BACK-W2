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

    #[Route('/logout', name: "logout", methods: ["GET"])]
    public function logout()
    {
        $sessionManager = new SessionManager();
        //$logStatut = $sessionManager->check_login();
        $sessionManager->logout();
        header("location: /" );

        //$this->render("logout.php", [], "Logout page", $logStatut);
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
        $getUser = $userManager->readUser($username);

        if($signin){
            if($getUser){
                echo "<script type='text/javascript'>alert('this pseudo already use, please choice an other.'); location.href='/login'</script>";
            }else{
                $userManager->creatUser($username, $pwd_hash);
                header("location: /login" );
            }
        }
        if($login){
            if(isset($getUser[0])){
                if (!password_verify($pwd, $getUser[0]->getPwd())){
                    echo "<script type='text/javascript'>alert('Password an username don't match.'); </script>";
                }
                elseif(password_verify($pwd, $getUser[0]->getPwd())){
                    $sessionManager->login($username);
                    header("location: /" );
                }
            }else{
                header("location: /login" );
                echo "<script type='text/javascript'>alert('Password an username don't match.'); </script>";

            }

        }
        if($resmdp){
            $userManager->updatePwd($username, $pwd);
            header("location: /login" );

        }

    }

}

