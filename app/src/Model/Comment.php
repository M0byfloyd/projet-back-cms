<?php

namespace App\Model;

use PDO;

class Comment extends BaseModel
{
    public function getAllByPost($id) {

            $datas =  $this->db_query->query('SELECT * FROM comment WHERE user_id = ' . $id)->fetchAll(PDO::FETCH_ASSOC);
            $dataResult = [];

            foreach ($datas as $data) {
                $dataResult[$data['id']] = new \App\Entity\Comment($data);
            }

            return $dataResult;
    }
}