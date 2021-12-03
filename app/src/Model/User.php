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

    public function getById($id)
    {
        return new \App\Entity\User($this->db_query->query('select * FROM user WHERE id = ' . $id )->fetch());
    }
}
