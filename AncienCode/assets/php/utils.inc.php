<?php
//affichage
function start_page($title)
{
    echo '<!DOCTYPE html> <html lang="fr">'. PHP_EOL . '<head><title>' .$title . '</title>
    <link rel="stylesheet"  type="text/css" href="../style/style.css" > <!-- Importation du CSS -->
    <link rel="shortcut icon" type="image/png" href="../style/favicon.png"/> <!-- Favicon -->
   
<!-- Barre de navigation -->
   <nav class="nav-bar">
    <img src="../style/logo_vanestarre.png" alt="logo"></img>
     <ul>
      <li><a href="../../accueil.php">Accueil</a></li>
      <li><a href="../../a-propos.php">À propos</a></li>
      <li><a href="../../connexion.php">Connexion</a></li>
      <li><a href="../../admin.php">Admin</a></li>
    </ul>
</nav>

</head><body>' . PHP_EOL;
}

//affichage
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
