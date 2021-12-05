<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserManager as UserModel;

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
            var_dump($userModel->getUserByName($name));

            if (empty($user)) {
                $this->render('account/login', ['paths' => $this->paths], 'Page de connexion');
                echo 'Cet utilisateur n\'existe pas';
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('account/login', ['paths' => $this->paths], 'Page de connexion');
                echo 'Mauvais mdp';
                return;
            }



            $_SESSION['user'] = serialize($user);

            $this->HTTPResponse->redirect($this->paths['account']);

            exit();
        }
    }


    public function signup()
    {

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            $this->render('account/signup', ['paths' => $this->paths], 'Page d\'inscription');
        } else {
            $userModel = new UserModel();

            $_SESSION['user'] = serialize($userModel->getById($userModel->setUser(new User(['password' => $password, 'name' => $name]))));

            $this->HTTPResponse->redirect($this->paths['account']);

            exit();
        }
    }


    public function account()
    {
        $this->render('account/index', ['paths' => $this->paths, 'user' => unserialize($_SESSION['user'])], 'Page administration');
    }

    public function logout()
    {
        unset($_SESSION['user']);

        $this->HTTPResponse->redirect('/');
    }
}
