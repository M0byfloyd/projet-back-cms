<?php

namespace App\Factory;
use App\Model\Author as AuthorModel;
use App\Entity\Author as AuthorEntity;

class Author
{
    public function getAll() {
        //$entity = new AuthorEntity();
        $model = new AuthorModel();

        return $model->getAll();
    }
}