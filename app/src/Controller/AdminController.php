<?php

namespace App\Controller;

use App\Model\UserModel;

class AdminController extends BaseController
{
    public function showAll()
    {
        
        $model = new User();
        $user = new User();
        $allUsers = $model->getAll();
        
        
            

        $this->render('account/users',['allUsers' => $allUsers],'Les Users');

    }

}