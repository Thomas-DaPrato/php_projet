<!-- Formulaire de connexion-->
<fieldset>
    <h1 class="title_co">Se connecter</h1>
    <b><?php echo $A_vue['etat'] ?></b>
    <form action="index.php?c=Connexion&a=Connexion" method="post">
        <input type="text" name="pseudo" placeholder='Pseudo'/><br>
        <input type="password" name="mdp" placeholder='Mot de passe'/><br>
        <button type="submit" name="action" value="connexion">Connexion</button>

    </form><br/>
    <a href="index.php?c=Inscription&a=Afficher">Pas encore inscrit ?</a>
</fieldset>