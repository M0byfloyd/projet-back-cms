<?php

namespace App\Controller;

use App\Model\Post;
use App\Model\Author;

class PostController
{
    public function showAll()
    {
        $model = new Post();
        $author = new Author();
        $allPosts = $model->getAll();

        ob_start();
        ?>
        <table border="1px">
            <thead>
            <tr>
                <th>
                    Titre
                </th>
                <th>
                    Auteur
                </th>
                <th>
                    Contenu
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($allPosts as $post) {
                ?>
                <tr>
                    <td>
                        <?= $post->title ?>
                    </td>
                    <td>
                        <?= $author->getById($post->authorid)->name?>
                    </td>
                    <td>
                        <?= $post->content ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }

    public function showFirstPost()
    {
        $model = new Post();
        return $model->getById(1);
}
}