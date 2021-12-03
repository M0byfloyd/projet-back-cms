<?php

namespace App\Model;

use App\Entity\User as UserEntity;
use PDO;

class User extends BaseModel
{
    public function getAll(): array
    {
        $datas =  $this->db_query->query('SELECT * FROM user')->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new UserEntity($data);
        }

        return $dataResult;
    }

    public function getById($id): UserEntity
    {
        return new UserEntity($this->db_query->query('SELECT * FROM user WHERE id = ' . $id )->fetch());
    }

    public function getUserByName($name): UserEntity
    {
        return new UserEntity($this->db_query->query("SELECT * FROM user WHERE name = '" . $name . "'" )->fetch());
    }

    public function setUser($name, $password) {
        $this->db_query->query("INSERT INTO user (name, password, statut) VALUE ('$name', '$password', '1')");

        return intval($this->db_query->lastInsertId());
    }
}
