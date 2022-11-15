<?php 

namespace App\Interfaces;

interface PasswordProtectedInterface
{
    public function getHashedPassword(): string;

    public function passwordMatch(): bool;
}

?>