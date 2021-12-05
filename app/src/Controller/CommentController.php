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


        $newComment = ['post_id' => $this->params['id'], 'user_id' => AccountController::getLoggedUser()->getId(), 'content' => $_POST['content']];

        $comment = new Comment($newComment);

        $postManager->addComment($postManager->getById($this->params['id']), $commentManager->setComment($comment));

        $this->HTTPResponse->redirect('/post/' . $this->params['id']);

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