<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Model\CommentManager;
use App\Model\PostManager;

class CommentController extends BaseController
{

    public function showAllByPost($id)
    {
        $commentModel = new CommentManager();

        $commentModel->getAllByPost($id);
    }

    public function setComment()
    {

        if (empty($_POST['content'])) {
            $this->render('comment/add', [], 'Création de commentaire');
            return;
        }

        $commentManager = new CommentManager();
        $postManager = new PostManager();

        $comment = new Comment(['post_id' => $this->params['postId'], 'user_id' => AccountController::getLoggedUser()->getId(), 'content' => $_POST['content']]);


        var_dump($this->params['id']);

        //$postManager->addComment(), $commentManager->setComment($comment));

        $this->HTTPResponse->redirect('/post/' . $this->params['postId']);

    }

    public function updateComment()
    {
        $commentManager = new CommentManager();

        $post = $commentManager->getById($this->params['id']);

        if (empty($_POST['content'])) {
            $this->render('comment/modify-comment', ['post' => $post], 'Modification du commentaire');
        } else {

        }
    }

}