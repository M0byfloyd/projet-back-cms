<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
use App\Controller\AccountController;

$router = new App\Router();
$router->getController();