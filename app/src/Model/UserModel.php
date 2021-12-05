<?php

namespace App\Model;

use App\Entity\User as User;
use PDO;

class UserModel extends BaseModel
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

    public function setUser($name, $password)
    {
        $this->db_query->query("INSERT INTO user (name, password, statut) VALUE ('$name', '$password', '1')");

        return intval($this->db_query->lastInsertId());
    }

    public function updateUser(User $user)
    {
        var_dump($user);

        $sql = "UPDATE user SET password = '" . $user->getPassword() . "' name = '" . $user->getName() . "' statut = " . $user->getStatut() . " WHERE id =" . $user->getId();

        var_dump($sql);
        var_dump($this->db_query->query($sql));

        return intval($this->db_query->lastInsertId());
    }
}
