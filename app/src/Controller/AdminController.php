<?php

namespace App\Controller;

use App\Model\User;

class AdminController extends BaseController
{
    public bool $isConnected;

    public string $generalPath = 'admin/';
    public array $paths = ['login' => 'login'];

    public function showConnectionForm() {
        $this->render('admin/connection', [] , 'Page de connexion' );
    }

    public function checkConnexion() {
        $userModel = new User();

    }
}