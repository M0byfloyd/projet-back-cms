<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

$router = new App\Router();
$router->getController();