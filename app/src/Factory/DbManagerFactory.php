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
            'back_cms',
            'root',
            'example');
    }

    public function query($query) {
        return $this->dbManager->query($query);
    }

    public function lastInsertId() {
        return $this->dbManager->lastInsertId();
    }
}