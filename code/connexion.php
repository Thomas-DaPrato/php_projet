<?php require 'utils.inc.php';
start_page('Login');?>

<?php
if (isset($_GET['etat']) && $_GET['etat'] == 'echec') {
    echo '<b> Identifiant ou mot de passe invalide, veuillez réessayer. </b> ';
}
?>

<!-- Formulaire de connexion-->
<fieldset>
    <h1 class="title_co">Se connecter</h1>
    <form action="traitement.php" method="post">
        <input type="text" name="pseudo" placeholder='Pseudo' required/><br>
        <input type="password" name="mdp" placeholder='Mot de passe' required/><br>
        <button type="submit" name="action" value="connexion">Connexion</button>
    </form><br/>
    <a href="inscription.php">Pas encore inscrit ?</a>
</fieldset>
<?php end_page();?>
