<?php

namespace App\Model;

use App\Entity\Comment;
use PDO;

class CommentManager extends BaseManager
{
    public function getAllByPost($id) {

            $datas =  $this->db_query->query('SELECT * FROM comment WHERE user_id = ' . $id)->fetchAll(PDO::FETCH_ASSOC);
            $dataResult = [];

            foreach ($datas as $data) {
                $dataResult[$data['id']] = new Comment($data);
            }

            return $dataResult;
    }
}