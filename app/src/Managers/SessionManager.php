<?php 

namespace App\Managers;

use App\Entitys\User;

class SessionManager extends BaseManager
{

    private bool $connected = false;
    private string $username;

    function __construct()
    {
        if(!isset($_SESSION["username"])){session_start();};
        $this->check_login();
    }

    public function is_connected(): bool //savoir si la session est démarrer
    {
        return $this->connected;
    }

    public function login($user) //démarrer la session
    {
        $this->username = $_SESSION["username"] = $user;
        $this->connected = true;
    }

    public function logout() //arreter la session
    {
        unset($_SESSION["username"]);
        unset($this->username);
        session_destroy();
        $this->connected = false;
        exit();
    }

    public function check_login() //savoir si l'utilisateur est connecté
    {
        if (isset($_SESSION["username"])) {
            $this->username  = $_SESSION["username"];
            $this->connected = true;
            return true;
        }else {
            unset($this->username);
            $this->connected = false;
            return false;
        }
    }

}

//$session = new SessionManager();
