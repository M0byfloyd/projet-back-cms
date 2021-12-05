<?php

namespace App\Controller;

use App\Model\UserModel as UserModel;

class AccountController extends BaseController
{
    public array $paths = [
        'login' => '/login',
        'account' => '/account',
        'signup' => '/signup'
    ];

    public function logIn()
    {

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            $this->render('account/login', ['paths' => $this->paths], 'Page de connexion');
        } else {
            $userModel = new UserModel();

            $user = $userModel->getUserByName($name);

            if ($user->getPassword() !== $password) {
                die('WRONG PASS WORD');
            }
            $_SESSION['user'] = serialize($userModel->getById($userModel->setUser($name, $password)));

            $this->request->redirect($this->paths['account']);
            exit();
        }
    }

    public function signup()
    {

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            $this->render('account/signup', ['paths' => $this->paths], 'Page d\'inscritiption');
        } else {
            $userModel = new UserModel();

            $_SESSION['user'] = serialize($userModel->getById($userModel->setUser($name, $password)));

            $this->request->redirect($this->paths['account']);

            exit();
        }
    }


    public function account()
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $statut = $_POST['statut'];

        $this->render('account/index', ['paths' => $this->paths, 'user' => unserialize($_SESSION['user'])], 'Page administration');
    }

    public function logout()
    {
        unset($_SESSION['user']);

        $this->request->redirect('/');
    }
    
}