<!DOCTYPE html> <html lang="fr"><head>
    <title>' .$title . '</title>
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

</head><body>
}

//affichage
</body></html>';

//affichage
if (!($resultRequete = mysqli_query($link,$querry)))
{
//affichage
echo 'erreur de requete <br/>';
echo 'erreur :' .mysqli_error($link) . '<br/>';
echo 'requete : ' .$querry . '<br/>';
}

//Affichage
echo '<div class="container_msg">';
    while ($result = mysqli_fetch_assoc($resultRequete))
    {
    echo '<div class="msg">';
        echo $result['texte'],'<br/>';
        echo '</div>';
    }
    echo 'ici ya tous les messages présent sur le réseau social';
    echo '</div>';

//affichage
echo Bienvenue '.$nom.', votre requête a bien été enregistrée ! <br/>
<a href = accueil.php.php> Retour à la page d\'accueil</a>';

//affichage
<form action="assets/php/recherche_tag.php" method="post">
    <input type="text" name="rechercher_tag" placeholder="tag" required>
    <button type="submit" name="recherche">Ok</button>
</form>

//affichage
if (isset($_GET['etat']) && $_GET['etat'] == 'echec') {
echo '<b> Identifiant ou mot de passe invalide, veuillez réessayer. </b> ';

<!--affichage-->
<!-- Formulaire de connexion-->
<fieldset>
    <h1 class="title_co">Se connecter</h1>
    <form action="assets/php/traitement.php" method="post">
        <input type="text" name="pseudo" placeholder='Pseudo'/><br>
        <input type="password" name="mdp" placeholder='Mot de passe'/><br>
        <button type="submit" name="action" value="connexion">Connexion</button>

    </form><br/>
    <a href="inscription.php">Pas encore inscrit ?</a>
</fieldset>


//affichage
if (isset($_GET['etat']) && $_GET['etat'] == 'echec') {
    echo '<b> Identifiant ou mot de passe invalide, veuillez réessayer. </b> ';
}


<!-- Affichage -->
<!-- Formulaire d'inscription -->
<fieldset>
    <h1 class="title_co">Se connecter</h1>
    <form action="assets/php/traitement.php" method="post">
        <!-- faire une redirection vers une page d'inscription ? -->
        <input type="text" name="pseudo" placeholder='Pseudo' required/><br>
        <input type="email" name="email" placeholder='Email' required><br>
        <input type="password" name="mdp" placeholder='Mot de passe' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required  title="Doit contenir au moins un chiffre, une minuscule, une majuscule, et au moins 8 caractères" id="mdp_field_1" onchange="verifMdp()"/><br>
        <input type="password" name="verificationmdp" placeholder='Confirmation mpd' id="mdp_field_2" onchange="verifMdp()"  required><br/>
        <button type="submit" name="action" value="inscription" id="submit_button" disabled>Inscription</button>
    </form>
</fieldset>




