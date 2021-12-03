<pre>
<?php
var_dump($user);

?>
    </pre>
<div class="row">
    <h1>Infos perso</h1>
    <p>Nom : <?= $user->name ?></p>
    <p>Admin : <?php var_dump($user->statut); ?></p>
</div>