<?php require 'utils.inc.php';
start_page('Login');?>

<script src="assets/scripts/inscription.js"></script> 

<?php
if (isset($_GET['etat']) && $_GET['etat'] == 'echec') {
    echo '<b> Identifiant ou mot de passe invalide, veuillez réessayer. </b> ';
}
?>

<!-- Formulaire d'inscription -->
<fieldset>
    <h1 class="title_co">Se connecter</h1>
    <form action="traitement.php" method="post">
        <!-- faire une redirection vers une page d'inscription ? -->
        <input type="text" name="pseudo" placeholder='Pseudo' required/><br>
        <input type="email" name="email" placeholder='Email' required><br>
        <input type="password" name="mdp" placeholder='Mot de passe' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required  title="Doit contenir au moins un chiffre, une minuscule, une majuscule, et au moins 8 caractères" id="mdp_field_1" onchange="verifMdp()"/><br>
        <input type="password" name="verificationmdp" placeholder='Confirmation mpd' id="mdp_field_2" onchange="verifMdp()"  required><br/>
        <button type="submit" name="action" value="inscription" id="submit_button" disabled>Inscription</button>
	</form>
</fieldset>

