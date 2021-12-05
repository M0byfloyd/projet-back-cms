<?php

namespace App\Core;

class Request
{
    public function redirect($newUrl) {
        header('Location: ' . $newUrl);
    }

}