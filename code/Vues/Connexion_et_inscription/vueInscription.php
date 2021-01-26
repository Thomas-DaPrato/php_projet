<script src="Contenu/Scripts/inscription.js"></script>

<fieldset>
    <b><?php echo $A_vue['etat'] ?></b>
    <h1 class="title_co">S'inscrire</h1>
    <form action="index.php?c=Utilisateur&a=Inscription" method="post">
        <input type="text" name="pseudo" placeholder='Pseudo' required/><br>
        <input type="email" name="email" placeholder='Email' required><br>
        <input type="password" name="mdp" placeholder='Mot de passe' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required  title="Doit contenir au moins un chiffre, une minuscule, une majuscule, et au moins 8 caractères" id="mdp_field_1" onchange="verifMdp()"/><br>
        <input type="password" name="verificationmdp" placeholder='Confirmation mpd' id="mdp_field_2" onchange="verifMdp()"  required><br/>
        <button type="submit" name="action" value="inscription" id="submit_button">Inscription</button>
    </form>
</fieldset>