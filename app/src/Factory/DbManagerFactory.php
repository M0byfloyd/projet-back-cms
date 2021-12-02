<?php

namespace App\Factory;

use App\Database\DbManager as DbManager;

class DbManagerFactory
{
    protected DbManager $dbManager;

    public function __construct()
    {
        $this->dbManager = new DbManager('db',
            '3306',
            'back-cms',
            'root',
            'example');
    }

    public function get($query) {
        return $this->dbManager->get($query);
    }
}