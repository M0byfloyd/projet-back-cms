<?php

foreach ($allPosts as $post):
    ?>
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="Image indisponible">
        <div class="card-body">
            <h5 class="card-title"><?= $post->getTitle() ?></h5>
            <p class="card-text"><?= $post->getContent() ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($post->commentList as $comment): ?>

                <li class="list-group-item"><b><?= $comment->getUserId() ?></b> : <?= $comment->getContent() ?></li>

            <?php endforeach; ?>
        </ul>

        <div class="card-body">
            <p><a href="/post/<?= $post->getId() ?>">Le consulter</a></p>
          <span>
              De : <a href="#" class="card-link"><?= $post->user->name ?></a>
          </span>
        </div>
    </div>
<?php endforeach;