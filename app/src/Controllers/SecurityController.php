<?php

namespace App\Controllers;

use App\Factorys\PDOFactory;
use App\Managers\UserManager;
use App\Routes\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: "login", methods: ["POST"])]
    public function login()
    {
        $formUsername = $_POST['username'] = "toto";
        $formPwd = $_POST['password'] = "toto";

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($formUsername);

        if (!$user) {
            header("Location: /?error=notfound");
            exit;
        }

        if ($user->passwordMatch($formPwd)) {

            $this->render("user/showUsers.php", [
                "message" => "je suis un message"
            ],
                "titre de la page");
        }

        header("Location: /?error=notfound");
        exit;
    }
}
