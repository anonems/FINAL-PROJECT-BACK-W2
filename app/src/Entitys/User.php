<?php

namespace App\Entitys;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity
{
    private $id;
    private $username;
    private $pwd;
    private $joindate;
    private $role;

    //setters
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $username;
    }

    public function setRole(string $role): User
    {
        $this->role = $role;
        return $role;
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

    public function getJoindate(): string
    {
        return $this->joindate;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    //midelwares
    public function passordMatch(): bool
    {
        //...
    }

}
?>