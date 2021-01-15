<?php
function start_page($title)
{
    echo '<!DOCTYPE html> <html lang="fr">'. PHP_EOL . '<head><title>' .$title . '</title>
    <link rel="stylesheet"  type="text/css" href="assets/style.css" > <!-- Importation du CSS -->
    <link rel="shortcut icon" type="image/png" href="assets/favicon.png"/> <!-- Favicon -->
   
<!-- Barre de navigation -->
   <nav class="nav-bar">
    <img src="assets/logo_vanestarre.png" alt="logo"></img>
     <ul>
      <li><a href="accueil.php">Accueil</a></li>
      <li><a href="a-propos.php">À propos</a></li>
      <li><a href="co-ins.php">Connexion/Inscription</a></li>
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
