<header>
    <li><a href="/">Accueil</a></li>
    <?php if $user->isAdmin(): ?> 
        <li><a href="/userlist">Liste utilisateurs</a></li> 
       <?php endif; ?>
    <?php if $user: ?>
    <li><a href="/writeArticle">Nouveau post</a></li>
    <li><button>Se déconnecter</button></li>
    <?php elseif: ?>
    <li><button>Se connecter</button></li>
    <li><button>S'inscrire</button></li>
    <?php endif; ?>
</header>