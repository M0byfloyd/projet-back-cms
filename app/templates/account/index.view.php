<div class="row">
    <h1>Infos perso</h1>
    <p>Avec possibilité de les modifier !</p>

    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control" value="<?= $user->getName() ?>" id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   placeholder="Votre nouveau nom"
                    name="name"
            >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe :</label>
            <input type="password" class="form-control" value="<?= $user->getPassword() ?>" id="exampleInputPassword1"
                   placeholder="Nouveau mdp"
                    name="password"
            >
        </div>
        <div class="form-check">
            <input type="checkbox" checked="<?= $user->getStatut() ?>" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1"> Admin</label>
        </div>
        <button type="submit" class="btn btn-primary">Modifier mes infos !</button>
    </form>

    <?php
    if ($user->getStatut()) { ?>
        <a href="/users">Voir la liste des utilisateur</a>
    <?php } ?>
</div>