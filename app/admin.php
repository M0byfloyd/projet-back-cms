<?php


require __DIR__ . '/vendor/autoload.php';

use App\Controller\AdminController;


$adminController = new AdminController();

$adminController->showConnectionForm();