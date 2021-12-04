<?php

namespace App\Model;

use App\Core\PDOFactory;

abstract class BaseModel
{
    protected \PDO $db_query;
    public function __construct()
    {
        $this->db_query = PDOFactory::dbConnexion();
    }
}