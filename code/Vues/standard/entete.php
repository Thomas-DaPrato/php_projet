<header>

            <!-- Barre de navigation -->
            <nav class="nav-bar">
                <a href="index.php?c=Accueil&a=Afficher"><img src="Contenu/Images/logo_vanestarre.png" alt="logo"></a>

                <div class="pseudo">
        <?php

if (isset($_SESSION['pseudo'])) {
    echo '            <a href="index.php?c=Compte">'.$_SESSION['pseudo'].'</a>';
}
else{
    echo '            <a class="lien_menu" href="index.php?c=Utilisateur&a=Afficher">Connexion</a>' . PHP_EOL;
}
?>
                </div>
            </nav>

        </header>

