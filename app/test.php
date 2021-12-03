<?php

use App\Controller\PostController;

require __DIR__ . '/vendor/autoload.php';

$postController = new PostController();

$postController->showAll();