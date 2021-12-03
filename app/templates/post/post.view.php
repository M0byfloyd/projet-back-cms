<pre>
<?php
$post = $vars['post'];
var_dump(json_encode($vars));
?>
</pre>
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="Image indisponible">
  <div class="card-body">
    <h5 class="card-title"><?= $post->title ?></h5>
    <p class="card-text"><?= $post->content ?></p>
  </div>
<ul class="list-group list-group-flush">
      <?php foreach ($post->commentList as $comment): ?>

          <li class="list-group-item"><b><?= $comment->user_id ?></b> : <?= $comment->content ?></li>
  </ul>

  <div class="card-body">
      <span>
          De : <a href="#" class="card-link"><?= $post->user->name ?></a>
      </span>
  </div>
</div>
<?php endforeach;