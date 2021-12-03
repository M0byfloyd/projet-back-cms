<?php

namespace App\Controller;

use App\Model\User;

class AdminController extends BaseController
{
    public bool $isConnected;

    public function showConnectionForm() {
        $this->render('admin/index', [] , 'Page de connexion' );
    }

    public function checkConnexion() {
        $userModel = new User();

    }
}