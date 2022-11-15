<?php

namespace App\Entitys;

class Comment extends BaseEntity
{
    private $id;
    private $author;
    private $pubdate;
    private $content;
    private $id_article;
    private $id_parent_comment;

     //setters
     public function setAuthor(string $author): Comment
     {
         $this->author = $author;
         return $author;
     }
 
     public function setId_article(int $id_article): Comment
     {
         $this->id_article = $id_article;
         return $id_article;
     }
 
     public function setId_parent_comment(int $id_parent_comment): Comment
     {
         $this->id_parent_comment = $id_parent_comment;
         return $id_parent_comment;
     }
 
     //getters
     public function getId(): int
     {
         return $this->id;
     }
 
     public function getAuthor(): string
     {
         return $this->author;
     }
 
     public function getPubdate(): string
     {
         return $this->pubdate;
     }

     public function getContent(): string
     {
         return $this->content;
     }
 
     public function getId_article(): int
     {
         return $this->Id_article;
     }
 
     public function getId_parent_comment(): int
     {
         return $this->id_parent_comment;
     }

}
?>