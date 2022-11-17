<?php

namespace App\Entitys;

class Article extends BaseEntity
{

    //declarations
    private int $id;
    private string $author;
    private string $title;
    private string $content;
    private \Datetime $pubdate;
    private string $category;
    private bool $statut;
    private string $illustration;
    private string $descript;

    //setters
    public function setAuthor(string $author): Article
    {
        $this->author = $author;
        return $this;
    }

    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $this;
    }


    public function setCategory(string $category): Article
    {
        $this->category = $category;
        return $this;
    }

    public function setStatut(bool $statut): Article
    {
        $this->statut = $statut;
        return $this;
    }

    public function setIllustration(string $illustration): Article
    {
        $this->illustration = $illustration;
        return $this;
    }

    public function setDescript(string $descript): Article
    {
        $this->descript = $descript;
        return $this;
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

    public function getPubdate(): \Datetime
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