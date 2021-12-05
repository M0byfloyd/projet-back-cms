<?php

namespace App\Controller;

use App\Entity\Post;
use App\Model\CommentManager;
use App\Model\PostManager;
use App\Model\UserManager;

class PostController extends BaseController
{
    public function showAll()
    {
        $model = new PostManager();
        $user = new UserManager();
        $allPosts = $model->getAll();

        foreach ($allPosts as $post) {
            $thePost = $allPosts[$post->id];

            $thePost->user = $user->getById($post->user_id);
        }

        $this->render('post/posts', ['allPosts' => $allPosts], 'Les posts');
    }

    public function showOne()
    {
        $model = new PostManager();
        $user = new UserManager();
        $commentManager = new CommentManager();
        
        $thePost = $model->getById($this->params['id']);
        $thePost->user = $user->getById($thePost->user_id);
        $comments = $commentManager->getAllByPost($thePost->id);

        $this->render('post/post', ['thePost' => $thePost, 'comments' => $comments], 'Les posts');
    }

    public function newPost()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];

        if (empty($title) || empty($content)) {
            $this->render('post/new-post', [], 'Nouveau post');
        } else {
            $postModel = new PostManager();

            $postModel->setPost(
                new Post(
                    [
                        'title' => $title,
                        'content' => $content,
                        'date' => date('Y-m-d', time()),
                        'user_id' => AccountController::getLoggedUser()->getId(),
                        'commentlist'=>'[]'
                    ]));

            $this->HTTPResponse->redirect('/');
        }
    }

    public function updatePost()
    {
        $postModel = new PostManager();

        $post = $postModel->getById($this->params['id']);

        if (empty($_POST['title']) || empty($_POST['content'])) {
            $this->render('post/post-update', ['post' => $post], 'Modification du post');
        } else {
            $updatedPost = new Post(['title' => $_POST['title'], 'content' => $_POST['content'], 'id' => intval($this->params['id'])]);
            $postModel->updatePost($updatedPost);
            $this->HTTPResponse->redirect('/posts');
        }
    }

    public function deletePost() {
        $postModel = new PostManager();

        $postModel->deletePost($this->params['id']);
        $this->HTTPResponse->redirect('/posts');

    }
}
