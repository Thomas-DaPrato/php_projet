<header>

<!-- Barre de navigation -->
<nav class="nav-bar">
    <a href="index.php?c=Accueil&a=AfficherAccueil"><img src="Contenu/Images/logo_vanestarre.png" alt="logo"></a>

    <div class="pseudo" align="right">
        <?php
if (isset($_SESSION['pseudo'])) {
    echo '<a href="index.php?c=Accueil&a=AfficherAccueil">'.$_SESSION['pseudo'].'</a>';
}
else{
    echo '<a class="lien_menu" href="index.php?c=Utilisateur&a=Afficher">Connexion</a>';
}
?>
</div>
</nav>

</header>

