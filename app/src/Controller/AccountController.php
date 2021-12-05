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
        if (AccountController::isLogged()) {
            $this->HTTPResponse->redirect('/account');
        }

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            $this->render('account/login', ['paths' => $this->paths], 'Page de connexion');
        } else {
            $userModel = new UserModel();

            $user = $userModel->getUserByName($name);

            if ($user->id == -1) {
                $this->render('account/login', ['paths' => $this->paths], 'Page de connexion');
                echo 'Cet utilisateur n\'existe pas';
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('account/login', ['paths' => $this->paths], 'Page de connexion');
                echo 'Mauvais mdp';
                return;
            }

            $this->setLoggedUser($user);

            $this->HTTPResponse->redirect($this->paths['account']);

            exit();
        }
    }


    public function signup()
    {
        if (AccountController::isLogged()) {
            $this->HTTPResponse->redirect('/account');
        }

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            $this->render('account/signup', ['paths' => $this->paths], 'Page d\'inscription');
        } else {
            $userModel = new UserModel();

            if ($userModel->getUserByName($name)->id !== -1) {
                $this->render('account/signup', ['paths' => $this->paths], 'Page d\'inscription');
                echo 'Ce nom d\'utilisateur n\'est pas disponible';
                return;
            }
            $this->setLoggedUser($userModel->getById($userModel->setUser(new User(['password' => $password, 'name' => $name]))));

            $this->HTTPResponse->redirect($this->paths['account']);
        }
    }


    public function account()
    {
        if (!AccountController::isLogged()) {
            $this->HTTPResponse->redirect('/');
        }

        $this->render('account/index', ['paths' => $this->paths, 'user' => AccountController::getLoggedUser()], 'Page administration');
    }

    public function logout()
    {
        unset($_SESSION['user']);

        $this->HTTPResponse->redirect('/');
    }

    public static function isLogged(): bool
    {
        return !empty($_SESSION['user']);
    }

    public static function getLoggedUser()
    {
        if (!empty($_SESSION['user'])) {
            return unserialize($_SESSION['user']);
        }

        return null;
    }

    public function setLoggedUser(User $user) {
        $_SESSION['user'] = serialize($user);
    }
}
