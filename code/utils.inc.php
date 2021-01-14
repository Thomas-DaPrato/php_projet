<?php
function start_page($title)
{
    echo '<!DOCTYPE html> <html lang="fr">'. PHP_EOL . '<head><title>' .$title . '</title>
    <link rel="stylesheet"  type="text/css" href="style.css" > <!-- Importation du CSS -->
    <link rel="icon" type="image/ico" href="favicon.ico"/> <!-- Favicon -->
   
   <!-- Barre de navigation -->
   <div class="nav-bar">
   <span><h1>Le logo</h1></span>
    <ul>
      <li><a href="accueil.php">Accueil</a></li>
      <li><a href="a-propos.php">À propos</a></li>
      <li><a href="co-ins.php">Connexion/Inscription</a></li>
      <li><a href="admin.php">Admin</a></li>
    </ul>
</div>

</head><body>' . PHP_EOL;
}

function end_page()
{
    echo '</body></html>';
}
?>
