<?php

namespace App\Managers;

use App\Entitys\Comment;

class CommentManager extends BaseManager
{
    public function getAllComment($id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comment WHERE id_article = :id ");
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();

        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    public function getOneComment($id): Comment
    {
        $query = $this->pdo->prepare("SELECT * FROM comment WHERE id = :id");
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        $comment = new Comment($data);
        

        return $comment;
    }

    public function addComment($author, $content, $id_article): void
    {
        $query = $this->pdo->prepare("INSERT INTO comment (author, content, id_article) VALUES (:author, :content, :id_article) ");
        $query->bindValue('author', $author, \PDO::PARAM_STR);
        $query->bindValue('content', $content, \PDO::PARAM_STR);
        $query->bindValue('id_article', $id_article, \PDO::PARAM_STR);
        $query->execute();      
    }

    public function addChildComment($author, $content, $id_article, $id_parent_comment): void
    {
        $query = $this->pdo->prepare("INSERT INTO comment (author, content, id_article, id_parent_comment) VALUES (:author, :content, :id_article, :id_parent_content) ");
        $query->bindValue('author', $author, \PDO::PARAM_STR);
        $query->bindValue('content', $content, \PDO::PARAM_STR);
        $query->bindValue('id_article', $id_article, \PDO::PARAM_STR);
        $query->bindValue('id_parent_comment', $id_parent_comment, \PDO::PARAM_STR);
        $query->execute();      
    }

}
