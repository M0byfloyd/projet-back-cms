<?php

namespace App\Entity;

class Post extends BaseEntity
{
    public $title;
    public $content;
    public $authorid;

    /**
     * @return mixed
     */
    public function getAuthorid()
    {
        return $this->authorid;
    }

    /**
     * @param mixed $authorid
     */
    public function setAuthorid($authorid): void
    {
        $this->authorid = $authorid;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}