<?php

namespace App\Controller;

use App\Model\Comment;

class CommentController extends BaseController
{
    public function showAllByPost($id) {
        $commentModel= new Comment();

        $commentModel->getAllByPost($id);
    }

}