<?php

namespace App\Model;

use PDO;
use App\Entity\Post as Post;

class PostManager extends BaseManager
{

    public function getAll($classname = null): array
    {

        $datas =  $this->db_query->query('SELECT * FROM post')->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new Post($data);
        }

        return $dataResult;
    }

    public function getById($id)
    {
        return new Post($this->db_query->query('SELECT * FROM post WHERE id = ' . $id )->fetch(PDO::FETCH_ASSOC));
    }
}