<header>

<!-- Barre de navigation -->
<nav class="nav-bar">
    <img src="Contenu/Images/logo_vanestarre.png" alt="logo">
     <ul class="menu">
      <li class="menu_liste"><a href="index.php?c=Accueil&a=Afficher">Accueil</a></li>
      <li class="menu_liste"><a href="index.php?c=APropos&a=Afficher">À propos</a></li>
      <li class="menu_liste"><a href="index.php?c=Utilisateur">Connexion</a></li>
      <li class="menu_liste"><a href="#">Admin</a></li>

    </ul>
    <div align="right">
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


<section class="a_propos">
    Coucou je m'appelle Vanessa MAUREL, plus connu sous le nom de VANESTARRE. Tu te trouve sur mon petit réseau social. <br/>
    J'éspère que tu aimes me donner de l'argent car j'aime ça. <br/>
    Des bisous trop <em>swag</em>
</section>

</header>

