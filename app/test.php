<?php

require __DIR__ . '/vendor/autoload.php';


$authorController = new App\Controller\AuthorController();
$postController = new \App\Controller\PostController();

$authors = $authorController->showAll();
foreach ($authors as $author) {
    echo $author->name . '<br>';
}

$posts = $postController->showAll();
?>
<table>
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
    foreach ($posts as $post) {
        var_dump($post);
        ?>
        <tr>
            <td>
                <?= $post->title ?>
            </td>
            <td>
                <?= $post->_author_id ?>
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

