<?php

namespace App\Model;

use App\Entity\Author as AuthorEntity;
use PDO;

class Author extends BaseModel
{
    public function getAll(): array
    {
        $datas =  $this->db_query->get('SELECT * FROM author')->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new AuthorEntity($data);
        }

        return $dataResult;
    }

    public function getById($id)
    {
        return new \App\Entity\Author($this->db_query->get('select * FROM author WHERE id = ' . $id )->fetch());
    }
}
