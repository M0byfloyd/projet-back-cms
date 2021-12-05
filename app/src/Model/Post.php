<?php

namespace App\Model;

use PDO;
use App\Entity\Post as PostEntity;
use App\Entity\User;

class Post extends BaseModel
{
    private $classname = 'post';


    public function getAll($classname = null): array
    {

        $datas =  $this->db_query->query('SELECT * FROM post')->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new PostEntity($data);
        }

        return $dataResult;
    }

    public function getById($id)
    {
        return new \App\Entity\Post($this->db_query->query('SELECT * FROM post WHERE id = ' . $id )->fetch(PDO::FETCH_ASSOC));
    }

    public function setPost($title, $content) {

        $date = date('Y-m-d', time());
        $user_id = unserialize($_SESSION['user'])->getId();



        $this->db_query->query("INSERT INTO post (date, user_id, commentlist, title, content) VALUE ('$date', '$user_id', '[]', '$title', '$content')");

        return intval($this->db_query->lastInsertId());
    }
}