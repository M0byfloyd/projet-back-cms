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
            $thePost = $allPosts[$post->id];

            $thePost->user = $user->getById($post->user_id);
            $thePost->commentList = $comment->getAllByPost($post->id);
            $thePost->commentCount = count($thePost->commentList);
        }

        return parent::render(
            'post/posts',
            ['allPosts' => $allPosts],
            'Les posts'
        );
    }

    public function showOnePost($postId = 1)
    {
        $model = new Post();
        $user = new User();
        $comment = new Comment();

        $thePost = $model->getById($postId);

        $thePost->user = $user->getById($thePost->user_id);
        $thePost->commentList = $comment->getAllByPost($thePost->id);
        $thePost->commentCount = count($thePost->commentList);
        return parent::render('post/post', ['post' => $thePost], 'Le post');
    }
}
