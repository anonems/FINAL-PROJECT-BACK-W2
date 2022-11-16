<?php

namespace App\Entitys;

use App\Traits\Hydrator;

abstract class BaseEntity
{
    use Hydrator;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }
}

?>