<div class="row">
    <div class="col-12">
        <h1>
            <?= $thePost->getTitle() ?>
        </h1>
    </div>
    <div class="col-12">
        <?= $thePost->content ?>
    </div>
    <div>
        <h2>Commentaire(s) : </h2>
        <ul class="list-group">
            <?php foreach ($comments as $comment): ?>
                <li class="list-group-item"><b><?= $comment->getAuthor() ?> : </b> <?= $comment->getContent() ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>