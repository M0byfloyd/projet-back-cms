<?php

namespace App\Controller;

use App\Model\Author;

class AuthorController
{
    public Author $author;

    public function __construct()
    {
        $this->author = new Author();
    }

    public function showAll()
    {
        return $this->author->getAll();
    }

    public function showOne() {
        return $this->author->getById(1);
    }
}