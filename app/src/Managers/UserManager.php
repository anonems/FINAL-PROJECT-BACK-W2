<?php

namespace App\Managers;

use App\Entitys\User;
use App\Factorys\PDOFactory;
use App\Interfaces\Database;

class UserManager extends BaseManager
{
    public function getAllUsers(): array
    {
        $query = $this->pdo->query("select * from user");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }
}
