<?php

namespace App\Model;

use PDO;
use App\Entity\Post;
use App\Entity\User;

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

    public function setPost($title, $content) {

        $date = date('Y-m-d', time());
        $user_id = $_SESSION['user'];
        var_dump(unserialize($_SESSION['user']));


        $this->db_query->query("INSERT INTO post (date, user_id, commentlist, title, content) VALUE ('$date', 1, '[3]', '$title', '$content')");

        return intval($this->db_query->lastInsertId());
    }
}