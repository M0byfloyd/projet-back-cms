<?php

namespace App\Model;

use PDO;
use App\Entity\Post as Post;
use App\Vendor\Core\HTTPResponse as HTTPResponse;

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
        $postData = $this->db_query->query('SELECT * FROM post WHERE id = ' . $id )->fetch(PDO::FETCH_ASSOC);
        if (!$postData) {
            $HTTPResponse = new HTTPResponse();
            $HTTPResponse->redirect('/');
        } else {
            return new Post($postData);
        }
    }

    public function setPost(Post $post) {

        $this->db_query->query("INSERT INTO post (date, user_id, commentlist, title, content) VALUE ('" . $post->getDate() . "', '" .$post->getUser_id() ."', '[]', '".$post->getTitle() ."', '".$post->getContent() ."')");

        return intval($this->db_query->lastInsertId());
    }
}