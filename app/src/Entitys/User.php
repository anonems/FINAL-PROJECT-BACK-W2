<?php

namespace App\Entitys;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity
{
    private int $id;
    private string $username;
    private string $pwd;
    private Datetime $joindate;
    private string $role;

    //setters
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }

    //getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getHashedPassword(): string
    {
        //return $this->pwd;
    }

    public function getJoindate(): \Datetime
    {
        return $this->joindate;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    //midelwares
    public function passwordMatch(): bool
    {
        //...
    }

}
?>