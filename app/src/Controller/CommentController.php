<?php

namespace App\Controller;

use App\Model\CommentManager;

class CommentController extends BaseController
{

    public function showAllByPost($id) {
        $commentModel= new CommentManager();

        $commentModel->getAllByPost($id);
    }

}