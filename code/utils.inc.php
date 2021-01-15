<?php
function start_page($title)
{
    echo '<!DOCTYPE html> <html lang="fr">'. PHP_EOL . '<head><title>' .$title . '</title>
    <link rel="stylesheet"  type="text/css" href="assets/style.css" > <!-- Importation du CSS -->
    <link rel="icon" type="image/ico" href="assets/logo_vanestarre.png"/> <!-- Favicon -->
   
   <!-- Barre de navigation -->
   <div class="nav-bar">
   <span><h1>Le logo</h1></span>
    <ul class="menu">
      <li class="menu_liste"><a href="accueil.php">Accueil</a></li>
      <li class="menu_liste"><a href="a-propos.php">À propos</a></li>
      <li class="menu_liste"><a href="connexion.php">Connexion/Inscription</a></li>
      <li class="menu_liste"><a href="admin.php">Admin</a></li>
    </ul>
</div>

</head><body>' . PHP_EOL;
}

function end_page()
{
    echo '</body></html>';
}


function connection($hostname, $username, $pwd)
{
    if (!($dbLink = mysqli_connect($hostname, $username, $pwd)))
        die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    return $dbLink;
}


?>
