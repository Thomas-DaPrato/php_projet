<?php require 'utils.inc.php';
start_page('Login');?>

<!-- Formulaire d'inscription -->
<fieldset>
    <?php
    if (isset($_GET['etat']) && $_GET['etat'] == 'echec') {
        echo '<b> Problème inconnu, veuillez réessayer. </b> ';
    }
    if (isset($_GET['etat']) && $_GET['etat'] == 'emailinvalide') {
        echo '<b> Un compte existe déjà pour cet email, veuillez en choisir un autre ou 
        <a href="recuperation.php"></a>retrouver votre mot de passe</b> ';
    }
    if (isset($_GET['etat']) && $_GET['etat'] == 'pseudoinvalide') {
        echo '<b> Un compte existe déjà pour ce pseudo, veuillez en changer. </b> ';
    }
    ?>
    <h1 class="title_co">S'inscrire</h1>
    <form action="traitement.php" method="post">
        <!-- faire une redirection vers une page d'inscription ? -->
        <input type="text" name="pseudo" placeholder='Pseudo' required/><br>
        <input type="email" name="email" placeholder='Email' required><br>
        <input type="password" name="mdp" placeholder='Mot de passe' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required  title="Doit contenir au moins un chiffre, une minuscule, une majuscule, et au moins 8 caractères"/><br>
        <input type="password" name="verificationmdp" placeholder='Confirmation mpd' required><br/>
        <button type="submit" name="action" value="inscription">Inscription</button>
    </form>
</fieldset>

