<form action="index.php?c=Compte&a=Suppression" method="post">
    <div>Rentrez votre pseudo ici pour nous assurer que la suppression de votre compte n'est pas accidentelle
        (il sera alors impossible de le récupérer) <br/>
        <?php
        if (isset($A_vue['erreur'])) {
            echo $A_vue['erreur'];
        }
        ?> <!-- Recupération d'une eventuelle erreur-->
    </div>
    <input type="text" name="verif" placeholder="Votre pseudo">
    <input type="submit" name="submit">
</form>
