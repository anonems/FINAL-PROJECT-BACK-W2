<?php

namespace App\Managers;

use App\Entitys\Comment;

class CommentManager extends BaseManager
{
    public function getAllComment($id): array
    {
        $query = $this->pdo->prepare("select * from comment where id_article = :id ");
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
        $query = $this->pdo->prepare("select * from comment where id = :id");
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        $comment = new Comment($data);
        

        return $comment;
    }

    public function addComment($id, ): Comment
    {
        $query = $this->pdo->prepare("select * from comment where id = :id");
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        $comment = new Comment($data);
        

        return $comment;
    }

}
