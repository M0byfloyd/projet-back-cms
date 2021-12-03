<?php

namespace App\Controller;

use App\Model\User;

class UserController extends BaseController
{

    public function showAll()
    {
        $user = new User();
        $allUsers = $user->getAll();
        return parent::render(
            'user/users',
            ['allUsers' => $allUsers],
            'Les utilisateurs'
        );
    }

    public function showOneUser($userId = 1)
    {
        return $this->user->getById($userId);
    }
}
