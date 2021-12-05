<?php if (isset($_COOKIE['updateUser'])) {
    if ($_COOKIE['updateUser'] == 'true') {
        setcookie('updateUser', 'false', 0, '/');
        echo '<div class="fixed-top text-center mt-5" style="pointer-events: none;"><p class="alert alert-info d-inline-flex p-2 mt-2">Données mises à jour</p></div>';
    } elseif ($_COOKIE['updateUser'] == 'canceled') {
        setcookie('updateUser', 'false', 0, '/');
        echo '<div class="fixed-top text-center mt-5" style="pointer-events: none;"><p class="alert alert-warning d-inline-flex p-2 mt-2">Les mots de passes renseignés sont différents</p></div>';
    }
}
?>
<div class="row">
    <h1>Infos perso</h1>

    <form action="/user-update" method="post">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" value="<?= $user->getName() ?>" id="name" aria-describedby="emailHelp" placeholder="Nouveau nom" name="name">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" value="<?= $user->getPassword() ?>" id="password" placeholder="Nouveau mot de passe" name="password">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmation mot de passe</label>
            <input type="password" class="form-control" value="" id="confirmPassword" placeholder="Confirmer nouveau mot de passe" name="confirmPassword">
        </div>
        <div class="form-check">
            <label class="form-check-label" for="admin"> Admin</label>
            <input type="checkbox" checked="<?= $user->getStatut() ?>" class="form-check-input" name="statut" id="admin">
        </div>

        <input type="hidden" name="id" value="<?= $user->getId() ?>">
        <button type="submit" class="btn btn-primary">Modifier mes infos</button>
    </form>
</div>