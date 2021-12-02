<?php

namespace App\Model;

use PDO;
use App\Entity\Post as PostEntity;

class Post extends BaseModel
{
    private $classname = 'post';


    public function getAll($classname = null): array
    {

        $datas =  $this->db_query->get('SELECT * FROM post')->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new PostEntity($data);
        }

        return $dataResult;
    }
}