<header>

            <!-- Barre de navigation -->
            <nav class="nav-bar">
                <a href="index.php?c=Accueil&a=Afficher"><img class="logo" src="Contenu/Images/logo_vanestarre.png" alt="logo"></a>

                <section class="rechercheTag">
                    <form  action="index.php?" method="get">
                        <input type="hidden" name="c" value="Recherche">
                        <input type="hidden" name="a" value="Afficher">
                        <input type="hidden" name="page" value="1">
                        <h2>Rechercher</h2>
                        <input type="search" name="tag" placeholder="&#946;Tag">
                        <select name="tri">
                            <option value="defaut">defaut</option>
                            <option value="recent">recent</option>
                        </select>
                        <input class="loupe" type="submit" value="loupe">
                    </form>
                </section>

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

