<?php
function start_page($title)
{
    session_start();
    echo '<!DOCTYPE html> <html lang="fr">'. PHP_EOL . '<head><title>' .$title . '</title>
    <link rel="stylesheet"  type="text/css" href="assets/style.css" > <!-- Importation du CSS -->
    <link rel="icon" type="image/ico" href="assets/logo_vanestarre.png"/> <!-- Favicon -->
   
<!-- Barre de navigation -->
   <div class="nav-bar">
   <span><h1>Le logo</h1></span>
   <div style="text-align: right">';
    if (isset($_SESSION['pseudo'])) {
        echo $_SESSION['pseudo'];
    }
    else {
        echo 'Invité';
    }
    echo '
    </div>
    <ul class="menu">
      <li class="menu_liste"><a href="accueil.php">Accueil</a></li>
      <li class="menu_liste"><a href="a-propos.php">À propos</a></li>
      <li class="menu_liste"><a href="connexion.php">Connexion/Inscription</a></li>
      <li class="menu_liste"><a href="admin.php">Admin</a></li>
    <nav class="nav-bar">
   <h1 class="logo">Le logo</h1>
     <ul>
      <li><a href="accueil.php">Accueil</a></li>
      <li><a href="a-propos.php">À propos</a></li>
      <li><a href="connexion.php">Connexion/Inscription</a></li>
      <li><a href="admin.php">Admin</a></li>

    </ul>
</nav>

</head><body>' . PHP_EOL;
}

function end_page()
{
    echo '</body></html>';
}
?>
