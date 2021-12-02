<?php

namespace App\Model;

use App\Entity\Author as AuthorEntity;
use PDO;

class Author extends BaseModel
{
    private $classname = 'author';

    public function getAll($classname = null): array
    {
        $datas =  parent::getAll($this->classname)->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new AuthorEntity($data);
        }

        return $dataResult;
    }

    public function getById($idName, $id)
    {
        return parent::getById('id', $id);
    }
}
