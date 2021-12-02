<?php

namespace App\Controller;

use App\Model\Post;
use App\Model\Author;

class PostController extends BaseController
{
    public function showAll()
    {
        $model = new Post();
        $author = new Author();
        $allPosts = $model->getAll();

        return parent::render('Posts',['go'],'post');

    }

    public function showFirstPost()
    {
        $model = new Post();
        return $model->getById(1);
    }
}