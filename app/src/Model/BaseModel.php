<?php

namespace App\Model;

use App\Factory\DbManagerFactory as db_query;

abstract class BaseModel
{
    public db_query $db_query;


    public function __construct()
    {
        $this->db_query = new db_query();
    }
}