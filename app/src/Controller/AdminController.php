<?php

namespace App\Controller;

use App\Model\User;

class AdminController extends BaseController

    public array $paths = [
        'login' => '/login',
        'account' =>'/account',
        'signup'=>'/signup'
    ];

    public function logIn() {

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password) ) {
            $this->render('admin/login', ['paths'=> $this->paths] , 'Page de connexion' );
        } else {
            $userModel = new User();

            $user = $userModel->getUserByName($name);

            if ($user->getPassword() === $password) {
                die('WRONG PASS WORD');
            }

            header('Location: ' . $this->paths['account']);
            exit();
        }
    }

    public function signup() {

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password) ) {
            $this->render('admin/signup', ['paths'=> $this->paths] , 'Page d\'inscritiption' );
        } else {
            $userModel = new User();

            $_SESSION['user'] = serialize($userModel->getById($userModel->setUser($name, $password)));


            header('Location: ' . $this->paths['account']);
            exit();
        }
    }


    public function account() {
        $this->render('admin/index', ['paths'=> $this->paths, 'user' => unserialize($_SESSION['user'])], 'Page administration');
    }
}