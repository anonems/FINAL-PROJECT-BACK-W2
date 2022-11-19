<?php

namespace App\Managers;

use App\Entitys\Article;

class ArticleManager extends BaseManager
{
    public function readAllArticles(): array
    {
        $query = $this->pdo->query("SELECT * FROM article");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Article($data);
        }

        return $users;
    }

    public function readOneArticle(int $id): Article
    {
    $query = $this->pdo->prepare("SELECT * FROM article WHERE id = :id");
    $query->bindValue('id', $id, \PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    $article = new Article($data);
    

    return $article;
    }
}
