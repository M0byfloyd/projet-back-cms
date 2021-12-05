<?php

namespace App\Vendor\Core;

class PDOFactory
{
    public static function dbConnexion(): \PDO
    {
            return new \PDO('mysql:host=db:3306;dbname=back_cms', 'root', 'example');}
}