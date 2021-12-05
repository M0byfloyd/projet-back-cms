<?php

namespace App\Controller;

use App\Model\CommentManager;
use App\Model\PostManager;
use App\Model\UserManager;

class PostController extends BaseController
{
    public function showAll()
    {
        $model = new PostManager();
        $user = new UserManager();
        $comment = new CommentManager();
        $allPosts = $model->getAll();

        foreach ($allPosts as $post) {
            $thePost = $allPosts[$post->id];

            $thePost->user = $user->getById($post->user_id);
            $thePost->commentList = $comment->getAllByPost($post->id);
            $thePost->commentCount = count($thePost->commentList);
        }

        parent::render('post/posts',['allPosts' => $allPosts],'Les posts');

    }

    public function showOne()
    {
        $model = new PostManager();
        $user = new UserManager();
        $comment = new CommentManager();
        
        $thePost = $model->getById($this->params['id']);
        if (!$thePost) {
            var_dump('le post :');
        } else {
            var_dump('le post :tg');

        }

        $thePost->user = $user->getById($thePost->user_id);
        $comments = $comment->getAllByPost($thePost->id);
        $thePost->commentCount = count($comments);

        parent::render('post/post',['thePost' => $thePost, 'comments' => $comments],'Les posts');

    }
    public function newPost() {

        $title = $_POST['title'];
        $content = $_POST['content'];

        if (empty($title) || empty($content) ) {
            $this->render('post/new-post', ['paths'=> $this->paths] , 'Nouveaux  post' );
        } else {
            $postModel = new Post();

            $_SESSION['user'] = serialize($postModel->getById($postModel->setPost($title, $content)));

            header('Location: ' . $this->paths['account']);
            exit();
        }
    }
}