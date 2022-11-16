<?php

namespace App\Entitys;

class Article extends BaseEntity
{
    //declarations
    private $id;
    private $author;
    private $title;
    private $content;
    private $pubdate;
    private $category;
    private $statut;
    private $illustration;
    private $descript;

    //setters
    public function setAuthor(string $author): Article
    {
        $this->author = $author;
        return $author;
    }

    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $title;
    }

    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $content;
    }


    public function setCategory(string $category): Article
    {
        $this->category = $category;
        return $category;
    }

    public function setStatut(bool $statut): Article
    {
        $this->statut = $statut;
        return $statut;
    }

    public function setIllustration(string $illustration): Article
    {
        $this->illustration = $illustration;
        return $illustration;
    }

    public function setDescript(string $descript): Article
    {
        $this->descript = $descript;
        return $descript;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getPubdate(): string
    {
        return $this->pubdate;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getStatut(): bool
    {
        return $this->statut;
    }

    public function getIllustration(): string
    {
        return $this->illustration;
    }

    public function getDescript(): string
    {
        return $this->descript;
    }

}

?>