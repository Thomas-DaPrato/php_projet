<header>

<!-- Barre de navigation -->
<nav class="nav-bar">
    <img src="Contenu/Images/logo_vanestarre.png" alt="logo">
     <ul class="menu">
      <li class="menu_liste"><a href="index.php?c=Accueil&a=Afficher">Accueil</a></li>
      <li class="menu_liste"><a href="index.php?c=APropos&a=Afficher">À propos</a></li>
      <li class="menu_liste"><a href="index.php?c=Connexion&a=SeConnecter">Connexion</a></li>
      <li class="menu_liste"><a href="#">Admin</a></li>

    </ul>
    <div align="right">';
if (isset($_SESSION['pseudo'])) {
    echo $_SESSION['pseudo'];
}
else{
    echo 'Invité';
}
echo '</div>
</nav>


<section></section>

</header>

