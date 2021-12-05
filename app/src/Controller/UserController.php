<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends BaseController
{

    public function showAll(): array
    {
        return $this->user->getAll();
    }

    public function showOne()
    {
        return $this->user->getById(1);
    }
}