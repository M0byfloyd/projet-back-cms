<div class="row">
    <div class="col-12">
        <h1>
            <?= $thePost->getTitle() ?>
        </h1>
    </div>
    <div class="col-12">
        <?= $thePost->getContent() ?>
    </div>

    <?php
    if (\App\Controller\AccountController::chechIfIsLoggedUser($thePost->getUser_id())) {
    ?>

    <a href="/modify-post/<?= $thePost->getId() ?>">
        <button class="btn btn-warning">Modifier ce post</button>
    </a>
    <a href="/delete-post/<?= $thePost->getId() ?>">
        <button class="btn btn-danger">Supprimer ce post</button>
    </a>
    <?php
    }
    ?>

    <div class="col-12">
        Date : <?= $thePost->getDate() ?>
    </div>
    <div>
        <h2>Commentaire(s) : </h2>
        <ul class="list-group">
            <?php foreach ($comments as $comment): ?>
                <li class="list-group-item"><b><?= $comment->getUser_id() ?> : </b> <?= $comment->getContent() ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <?php
        if (\App\Controller\AccountController::isLogged()) {?>
            <a href="/new-comment/<?= $thePost->getId() ?>">
                <button class="btn btn-primary">Ajouter un commentaire</button>
            </a>
        <?php } ?>

    </div>
</div>