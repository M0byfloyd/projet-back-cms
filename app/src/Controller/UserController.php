<?php

namespace App\Controller;

use App\Model\User;

class UserController extends BaseController
{
    public User $user;

    public function __construct()
    {
        $this->user = new User();
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