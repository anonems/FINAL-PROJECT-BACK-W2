<?php

namespace App\Managers;

use App\Entitys\Article;

class ArticleManager extends BaseManager
{
    public function getAllArticles(): array
    {
        $query = $this->pdo->query("SELECT * FROM article");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Article($data);
        }

        return $users;
    }

    public function getOneArticle($id): Article
    {
    $query = $this->pdo->prepare("SELECT * FROM article WHERE id = :id");
    $query->bindValue('id', $id, \PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    $article = new Article($data);
    

    return $article;
    }
}
