<?php

namespace App\Interfaces;

interface Database
{
    public function getMySqlPDO(): \PDO;
 
}