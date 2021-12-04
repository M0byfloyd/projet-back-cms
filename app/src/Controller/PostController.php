<?php

namespace App\Controller;

use App\Model\Comment;
use App\Model\Post;
use App\Model\User;

class PostController extends BaseController
{
    public function showAll()
    {
        $model = new Post();
        $user = new User();
        $comment = new Comment();
        $allPosts = $model->getAll();

        foreach ($allPosts as $post) {
            $thePost =$allPosts[$post->id];

            $thePost->user = $user->getById($post->user_id);
            $thePost->commentList = $comment->getAllByPost($post->id);
            $thePost->commentCount = count($thePost->commentList);
        }



        parent::render('post/posts',['allPosts' => $allPosts],'Les posts');

    }

    public function showOne()
    {
        $model = new Post();
        $user = new User();
        $comment = new Comment();

        $thePost = $model->getById($this->params['id']);

            $thePost->user = $user->getById($thePost->user_id);
            $comments = $comment->getAllByPost($thePost->id);
            $thePost->commentCount = count($comments);

        parent::render('post/post',['thePost' => $thePost, 'comments' => $comments],'Les posts');

    }
}