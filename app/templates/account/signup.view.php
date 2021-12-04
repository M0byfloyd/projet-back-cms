<form method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
        <span>Vous avez déjà un compte ? <a href="<?= $paths['login'] ?>">Connectez-vous !</a></span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>