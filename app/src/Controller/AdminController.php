<?php

namespace App\Controller;

use App\Model\UserManager as UserManager;


class AdminController extends BaseController
{
    public function showAll()
    {
        
        $model = new UserManager();
        $allUsers = $model->getAll();

        $this->render('account/users',['allUsers' => $allUsers],'Les Users');

    }

    public function showOne()
    {
        
        $model = new UserManager();
        $theUser = $model->getById($this->params['id']);

        $this->render('account/users',['allUsers' => [$theUser]],'Le User');

    }

    public function deleteUser()
    {
        $model = new UserManager();
        $theUser = $model->getById($this->params['id']);

        $this->render('account/users',['allUsers' => [$theUser]],'Le User');
    }

}