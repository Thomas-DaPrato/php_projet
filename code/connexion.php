<?php require 'utils.inc.php';
start_page('Login');?>

<?php
if (isset($_GET['etat']) && $_GET['etat'] == 'echec') {
    echo '<b> Identifiant ou mot de passe invalide, veuillez réessayer. </b> ';
}
?>

<!-- Formulaire de connexion-->
<form action="traitement.php" method="post">
    <fieldset>
        <h1 class="title_co">Se connecter</h1>
        <input type="text" name="pseudo" placeholder='Pseudo'/><br>
        <input type="password" name="mdp" placeholder='Mot de passe'/><br>
        <button type="submit" name="action" value="connexion">Connexion</button>
    </fieldset>
</form>
<?php end_page();?>
