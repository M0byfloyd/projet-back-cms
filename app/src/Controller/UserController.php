<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController extends BaseController
{
    public UserModel $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function showAll(): array
    {
        return $this->user->getAll();
    }

   


    public function showOne()
    {
        return $this->user->getById(1);
    }
}