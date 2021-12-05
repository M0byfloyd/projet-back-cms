<?php
if (isset($_COOKIE['userDeleted'])) {
    if ($_COOKIE['userDeleted'] == 'true') {
        setcookie('userDeleted', 'false', 0, '/');
        echo '<div class="fixed-top text-center mt-5" style="pointer-events: none;"><p class="alert alert-info d-inline-flex p-2 mt-2">Utilisateur supprimé</p></div>';
    }
}

foreach ($allUsers as $user) :
?>
    <div class="card" style="width: 18rem;">
        <h5>User number : <?= $user->getId() ?></h5>
        <div class="card-body">
            <h5 class="card-title"><?= $user->getName() ?></h5>
        </div>
        <a href="/user-delete/<?= $user->getId() ?>"><button class="btn btn-danger">Supprimer cet utilisateur</button></a>
    </div>
    <br>
<?php endforeach;
