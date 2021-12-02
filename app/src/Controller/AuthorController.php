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
        return $this->author->getAll('author');
    }

    public function show() {
        return $this->author->getById(1,,);
    }
}