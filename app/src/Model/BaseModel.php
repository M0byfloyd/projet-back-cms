<?php

namespace App\Model;

use App\Factory\DbManagerFactory as db_query;

abstract class BaseModel
{
    public db_query $db_query;


    public function __construct($className)
    {
        $this->db_query = new db_query();
    }

    public function getAll($classname = null)
    {
        return $this->db_query->get('SELECT * FROM ' . $classname);
    }

    public function getById($idName, $id) {
        return $this->db_query->get('select * FROM WHERE' . $idName . ' = ' . $id );
    }
}