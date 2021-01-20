<?php
echo '<header> 

<!-- Barre de navigation -->
   <nav class="nav-bar">
    <img src="../style/logo_vanestarre.png" alt="logo"></img>
     <ul>
      <li><a href="index.php?c=Accueil&a=Afficher">Accueil</a></li>
      <li><a href="#">À propos</a></li>
      <li><a href="index.php?c=Utilisateur&a=Afficher">Connexion</a></li>
      <li><a href="#">Admin</a></li>
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
</header>';