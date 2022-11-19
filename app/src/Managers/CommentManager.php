<?php

namespace App\Managers;

use App\Entitys\Comment;

class CommentManager extends BaseManager
{
    public function creatComment( string $author, string $content, int $id_article, ?int $id_parent_comment): void
    {
        $query = $this->pdo->prepare("INSERT INTO comment (author, content, id_article, id_parent_comment) VALUES (:author, :content, :id_article, :id_parent_comment) ");
        $query->bindValue('author', $author, \PDO::PARAM_STR);
        $query->bindValue('content', $content, \PDO::PARAM_STR);
        $query->bindValue('id_article', $id_article, \PDO::PARAM_INT);
        $query->bindValue('id_parent_comment', $id_parent_comment, \PDO::PARAM_INT);
        $query->execute();      
    }
    
    public function readAllComment(int $id): array
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
    
    public function deleteComment( string $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM comment WHERE id=:id ");
        $query->bindValue('id', $id, \PDO::PARAM_INT);
        $query->execute();     
        $query2 = $this->pdo->prepare("DELETE FROM comment WHERE id_parent_comment=:id ");
        $query2->bindValue('id', $id, \PDO::PARAM_INT);
        $query2->execute();   
    }

}
