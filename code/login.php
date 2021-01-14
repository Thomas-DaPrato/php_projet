<?php require 'utils.inc.php';
start_page('Login');?>

<?php
if (isset($_GET['etat']) && $_GET['etat'] == 'CONNEXIONECHOUEE') {
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

<!-- Formulaire d'inscription -->
<form action="traitement.php" method="post">
    <fieldset>
        <!-- faire une redirection vers une page d'inscription ? -->
        <h3>Toujours pas inscrit ? Inscrivez-vous !!</h3><br>
        <input type="text" name="pseudo" placeholder='Pseudo' required/><br>
        <input type="email" name="email" placeholder='Email' required><br>
        <input type="password" name="mdp" placeholder='Mot de passe' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required  title="Doit contenir au moins un chiffre, une minuscule, une majuscule, et au moins 8 caractères"/><br>
        <input type="password" name="verificationmdp" placeholder='Confirmation mpd' required><br/>
        <button type="submit" name="action" value="inscription">Inscription</button>
    </fieldset>
</form>
<?php end_page();?>
