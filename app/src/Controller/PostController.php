<?php

namespace App\Controller;

use App\Model\Post;

class PostController
{
    public function showAll(): array
    {
        $model = new Post();
        return $model->getAll('post');
    }
}