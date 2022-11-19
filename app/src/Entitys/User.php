<?php

namespace App\Entitys;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity
{
    private int $id;
    private string $username;
    private string $pwd;
    private $joindate;
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
    public function setPwd(string $pwd): User
    {
        $this->pwd = $pwd;
        return $this;
    }

    public function setJoindate(string $joindate): User
    {
        $this->joindate = $joindate;
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

    public function getJoindate()
    {
        return $this->joindate;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function getPwd(): string
    {
        return $this->pwd;
    }

    //midelwares
    public function passwordMatch(string $pwd_hash): bool
    { 
        if (password_verify($pwd, getPwd())){
            return true;
        }
        else{
            return false;
        }
    }

}
?>