<?php require 'utils.inc.php';
start_page('Connexion/Inscription');?>

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
        <h3>Toujours pas inscrit ? Inscrivez-vous !!</h3>//faire une redirection vers une page d'inscription ?<br>
        <input type="text" name="pseudo" placeholder='Pseudo'/><br>
        <input type="email" name="email" placeholder='Email'><br>
        <input type="password" name="mdp" placeholder='Mot de passe'/><br>
        <button type="submit" name="action" value="inscription">Inscription</button>
    </fieldset>
</form>
<?php end_page();?>
