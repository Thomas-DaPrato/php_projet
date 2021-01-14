<?php require 'utils.inc.php';
start_page('Login');?>
<form action="traitement.php" method="post">
    pseudo</br>
    <input type="text" name="pseudo"/><br/>
    mot de passe <br/>
    <input type="password" name="mdp"/><br/>

    <button type="submit" name="action" value="connexion">Connexion</button>
</form>
<br/>
Toujours pas inscrit ? Inscrivez-vous !!
<form action="traitement.php" method="post">
    identifiant</br>
    <input type="text" name="nom"/><br/>
    email <br/>
    <input type="email" name="email"><br/>
    mot de passe <br/>
    <input type="password" name="mdp"/><br/>

    <button type="submit" name="action" value="inscription">Inscription</button>
</form>
<?php end_page();?>
