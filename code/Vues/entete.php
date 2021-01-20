<header>

<!-- Barre de navigation -->
<nav class="nav-bar">
    <img src="Contenu/Images/logo_vanestarre.png" alt="logo">
     <ul class="menu">
      <li class="menu_liste"><a class="lien_menu" href="index.php?c=Accueil&a=Afficher">Accueil</a></li>
      <li class="menu_liste"><a class="lien_menu" href="index.php?c=Utilisateur&a=Afficher">Connexion</a></li>
      <li class="menu_liste"><a class="lien_menu" href="#">Admin</a></li>

    </ul>
    <div class="pseudo" align="right">
        <?php
if (isset($_SESSION['pseudo'])) {
    echo $_SESSION['pseudo'];
}
else{
    echo 'Invité';
}
?>
</div>
</nav>


</header>

