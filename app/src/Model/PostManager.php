<?php

namespace App\Model;

use App\Entity\Post as Post;
use App\Vendor\Core\HTTPResponse as HTTPResponse;
use PDO;

class PostManager extends BaseManager
{

    public function getAll(): array
    {

        $datas = $this->db_query->query('SELECT * FROM post')->fetchAll(PDO::FETCH_ASSOC);
        $dataResult = [];

        foreach ($datas as $data) {
            $dataResult[$data['id']] = new Post($data);
        }

        return $dataResult;
    }

    public function getById($id)
    {
        $postData = $this->db_query->query('SELECT * FROM post WHERE id = ' . $id)->fetch(PDO::FETCH_ASSOC);
        if (!$postData) {
            $HTTPResponse = new HTTPResponse();
            $HTTPResponse->redirect('/');
        } else {
            return new Post($postData);
        }
    }

    public function setPost(Post $post): int
    {
        $this->db_query->query("INSERT INTO post (date, user_id, commentlist, title, content) VALUE ('" . $post->getDate() . "', '" . $post->getUser_id() . "', '" . $post->getCommentlist() . "', '" . $post->getTitle() . "', '" . $post->getContent() . "')");

        return intval($this->db_query->lastInsertId());
    }

    public function addComment(Post $post, $commentId)
    {
        $commentArray = json_decode($post->commentlist);
        $commentArray[] = $commentId;

        $sql = "UPDATE post SET commentlist = '" . json_encode($commentArray) . "'WHERE id = " . $post->getId();

        $this->db_query->query($sql);

        return intval($this->db_query->lastInsertId());
    }

    public function updatePost(Post $updatedPost) {
        $this->db_query->query("UPDATE post SET title = '" . $updatedPost->getTitle() . "', content = '" . $updatedPost->getContent() . "' WHERE id = " . $updatedPost->getId())->fetch(PDO::FETCH_ASSOC);
        return intval($this->db_query->lastInsertId());
    }

    public function deletePost($id) {
        $this->db_query->query('DELETE FROM post WHERE id = '. $id)->fetch(PDO::FETCH_ASSOC);
        return intval($this->db_query->lastInsertId());
    }
}