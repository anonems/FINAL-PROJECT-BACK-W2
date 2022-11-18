<?php

namespace App\Managers;

use App\Entitys\Article;

class ArticleManager extends BaseManager
{
    public function getAllArticles(): array
    {
        $query = $this->pdo->query("select * from article");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Article($data);
        }

        return $users;
    }

    public function getOneArticle($id): array
    {
    $query = $this->pdo->query("select * from article where id = $id");

    $users = [];

    while ($data = $query->fetch()) {
        $users[] = new Article($data);
    }

    return $users;
    }
}
