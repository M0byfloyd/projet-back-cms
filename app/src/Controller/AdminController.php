<?php

namespace App\Controller;

use App\Model\UserManager as UserManager;
use App\Entity\User as User;

class AdminController extends BaseController
{
    public function showAll()
    {

        $model = new UserManager();
        $allUsers = $model->getAll();

        $this->render('account/users', ['allUsers' => $allUsers], 'Les Users');
    }

    public function showOne()
    {

        $model = new UserManager();
        $theUser = $model->getById($this->params['id']);

        $this->render('account/users', ['allUsers' => [$theUser]], 'Le User');
    }

    public function deleteUser()
    {
        $model = new UserManager();
        $userToDelete = $model->getById($this->params['id']);
        if ($userToDelete->id == \App\Controller\AccountController::getLoggedUser()->id) {
            setcookie('userDeleted', 'canceled', 0, '/');
            $this->HTTPResponse->redirect('/users');
        } else {
            setcookie('userDeleted', 'true', 0, '/');
            $model->deleteUser($userToDelete->id);
            $this->HTTPResponse->redirect('/users');
        }
    }

    public function updateUser()
    {
        if (\App\Controller\AccountController::isLogged() && isset($_POST['name']) && ($_POST['password'] === $_POST['confirmPassword'])) {
            $updatedUser = new User([
                'name' => $_POST['name'],
                'statut' => $_POST['statut'] == 'on' ? 1 : 0,
                'password' => $_POST['password'],
                'id' => $_POST['id']
            ]);

            $model = new UserManager();
            $model->updateUser($updatedUser);
            \App\Controller\AccountController::logout();
        } elseif (\App\Controller\AccountController::isLogged() && isset($_POST['name']) && ($_POST['password'] !== $_POST['confirmPassword'])) {
            setcookie('userUpdated', 'canceled', 0, '/');
            $this->HTTPResponse->redirect('/account');
        }
    }
}
