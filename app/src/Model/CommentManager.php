<?php

namespace App\Model;

use App\Entity\Comment;
use App\Vendor\Core\HTTPResponse;
use PDO;

class CommentManager extends BaseManager
{
    public function getAllByPost($id): array
    {

            $datas =  $this->db_query->query('SELECT * FROM comment WHERE post_id = ' . $id)->fetchAll(PDO::FETCH_ASSOC);
            $dataResult = [];

            foreach ($datas as $data) {
                $dataResult[$data['id']] = new Comment($data);
            }

            return $dataResult;
    }

    public function getById($id)
    {
        $commentData = $this->db_query->query('SELECT * FROM comment WHERE id = ' . $id )->fetch(PDO::FETCH_ASSOC);
        if (!$commentData) {
            $HTTPResponse = new HTTPResponse();
            $HTTPResponse->redirect('/');
        } else {
            return new Comment($commentData);
        }
    }

    public function setComment(Comment $comment): int
    {
        $sql = "INSERT INTO comment (post_id, user_id, content) VALUE (" . $comment->getPost_Id() . ", " . $comment->getUSer_Id() . ", '" . $comment->getContent() . "')";

        $this->db_query->query($sql);

        return intval($this->db_query->lastInsertId());
    }
}