<?php

namespace App\Database;

class DbManager
{
    public \PDO $db;

    public function __construct(string $url, string $port, string $dbName, string $user, string $password)
    {
        $this->db = new \PDO('mysql:host=' . $url . ':' . $port . ';dbname=' . $dbName, $user, $password);
    }

    public function get($query)
    {
        return $this->db->query($query);
    }

    public function hydrate() {

    }
}