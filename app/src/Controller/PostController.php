<?php

namespace App\Controller;

use App\Model\Comment;
use App\Model\Post;
use App\Model\Author;

class PostController extends BaseController
{
    public function showAll()
    {
        $model = new Post();
        $author = new Author();
        $comment = new Comment();
        $allPosts = $model->getAll();

        foreach ($allPosts as $post) {
            $thePost =$allPosts[$post->id];

            $thePost->author = $author->getById($post->id);
            $thePost->commentList = $comment->getAllByPost($post->id);
            $thePost->commentCount = count($thePost->commentList);
        }



        return parent::render('post/posts',['allPosts' => $allPosts],'Les posts');

    }

    public function showFirstPost()
    {
        $model = new Post();
        return $model->getById(1);
    }
}