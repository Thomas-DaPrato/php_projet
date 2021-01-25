<header>

<!-- Barre de navigation -->
<nav class="nav-bar">
    <img src="Contenu/Images/logo_vanestarre.png" alt="logo">
     <ul class="menu">
      <li class="menu_liste"><a class="lien_menu" href="index.php?c=Accueil&a=AfficherAccueil">Accueil</a></li>
      <li class="menu_liste"><a class="lien_menu" href="index.php?c=Utilisateur">Connexion</a></li>
      <li class="menu_liste"><a class="lien_menu" href="#">Admin</a></li>

    </ul>
    <div class="pseudo" align="right">
        <?php
        if (isset($_SESSION['pseudo'])) {
            echo '<a href = index.php?c=Compte>'.$_SESSION['pseudo'].'</a>';
        }
        else{
            echo 'Invité';
        }
        ?>

    </div>
</nav>


</header>

