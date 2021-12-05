<?php

namespace App\Model;

use App\Entity\User;
use PDO;

class UserManager extends BaseManager
{

    public function getAll(): array
    {
        $datas = $this->db_query->query('SELECT * FROM user')->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new User($data);
        }

        return $dataResult;
    }

    public function getById($id): User
    {
        return new User($this->db_query->query('SELECT * FROM user WHERE id = ' . $id)->fetch());
    }

    public function getUserByName($name): User
    {
        return new User($this->db_query->query("SELECT * FROM user WHERE name = '" . $name . "'")->fetch());
    }

    public function setUser(User $user)
    {
        $this->db_query->query("INSERT INTO user (name, password, statut) VALUE ('". $user->getName()."', '" .$user->getPassword() ."', '1')");

        return intval($this->db_query->lastInsertId());
    }

    public function updateUser(User $user)
    {
        $sql = "UPDATE user SET password = '" . $user->getPassword() . "' name = '" . $user->getName() . "' statut = " . $user->getStatut() . " WHERE id =" . $user->getId();

        return intval($this->db_query->lastInsertId());
    }
}
