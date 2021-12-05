<?php

namespace App\Model;

use App\Vendor\Core\PDOFactory;

abstract class BaseManager
{
    protected \PDO $db_query;
    public function __construct()
    {
        $this->db_query = PDOFactory::dbConnexion();
    }
}