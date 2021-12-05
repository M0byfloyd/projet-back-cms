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
        $user = $this->db_query->query('SELECT * FROM user WHERE id = ' . $id)->fetch();
        if ($user) {
            return new User($user);
        } else {
            $user = new User();
            $user->id = -1;
            return $user;
        }
    }

    public function getUserByName($name): User
    {
        $user = $this->db_query->query("SELECT * FROM user WHERE name = '" . $name . "'")->fetch();
        if ($user) {
            return new User($user);
        } else {
            $user = new User();
            $user->id = -1;
            return $user;
        }
    }

    public function setUser(User $user): int
    {
        $this->db_query->query("INSERT INTO user (name, password, statut) VALUE ('" . $user->getName() . "', '" . $user->getPassword() . "', '1')");

        return intval($this->db_query->lastInsertId());
    }

    public function deleteUser($id) 
    {
        $this->db_query->query('DELETE FROM user WHERE id = '. $id)->fetch(PDO::FETCH_ASSOC);
        return intval($this->db_query->lastInsertId());
    }

    public function updateUser(User $updatedUser) {
        $sql = "UPDATE user SET password = '" . $updatedUser->getPassword() . "', name = '" . $updatedUser->getName() . "', statut = " . $updatedUser->getStatut() . " WHERE id =" . \App\Controller\AccountController::getLoggedUser()->id;
        $this->db_query->query($sql)->fetch(PDO::FETCH_ASSOC);
        return intval($this->db_query->lastInsertId());
    }
}
