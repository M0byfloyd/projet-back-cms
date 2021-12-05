<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $pageTitle ?></title>
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="navbar-brand nav-link" href="/">Le Bl⭕G</a>
                    </li>
                    <?php
                    if (!\App\Controller\AccountController::isLogged()) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="/login">Connexion</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/signup">Inscription</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="/account"><?= \App\Controller\AccountController::getLoggedUser()->getName(); ?></a></p>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/logout">Déconnexion</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/new-post">Ecrire un nouvel article</a>
                        </li>
                    <?php }
                    if (\App\Controller\AccountController::isLogged() && \App\Controller\AccountController::getLoggedUser()->getStatut()) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="/users">Liste des utilisateurs</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <?= $content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>