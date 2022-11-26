<?php

namespace App\Managers;

use App\Entitys\User;
use App\Factorys\PDOFactory;
use App\Interfaces\Database;

class UserManager extends BaseManager
{
    public function creatUser( string $username, string $pwd): void
    {
        $query = $this->pdo->prepare("INSERT INTO user (username, pwd) VALUES (:username, :pwd) ");
        $query->bindValue('username', $username, \PDO::PARAM_STR);
        $query->bindValue('pwd', $pwd, \PDO::PARAM_STR);
        $query->execute();      
    }

    public function readUser(string $username)
    {
        $query = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $query->bindValue('username', $username, \PDO::PARAM_STR);
        $query->execute(); 

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }
        return $users;
    }

    public function readAllUser(): array
    {
        $query = $this->pdo->query("SELECT * FROM user");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }
        return $users;
    }

    public function updateUser( string $username, string $pwd, string $rol, int $id): void
    {
        $query = $this->pdo->prepare("UPDATE user  SET username=:username, pwd=:pwd, rol=:rol) WHERE id=:id ");
        $query->bindValue('username', $username, \PDO::PARAM_STR);
        $query->bindValue('pwd', $pwd, \PDO::PARAM_STR);
        $query->bindValue('rol', $rol, \PDO::PARAM_STR);
        $query->bindValue('id', $id, \PDO::PARAM_STR);

        $query->execute();      
    }

    public function deleteUser( string $username): void
    {
        $query = $this->pdo->prepare("DELETE FROM user WHERE username=:username ");
        $query->bindValue('username', $username, \PDO::PARAM_INT);
        $query->execute();     
        $query2 = $this->pdo->prepare("DELETE FROM article WHERE author=:username ");
        $query2->bindValue('username', $username, \PDO::PARAM_INT);
        $query2->execute(); 
        $query3 = $this->pdo->prepare("DELETE FROM comment WHERE author=:username ");
        $query3->bindValue('username', $username, \PDO::PARAM_INT);
        $query3->execute();   
    }
}
