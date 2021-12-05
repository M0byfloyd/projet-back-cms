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
        
        foreach ($allUsers as $user) {
            $theUser = $allUsers[$user->id];
        }

            

        $this->render('account/users',['allUsers' => $allUsers],'Les Users');

    }

}