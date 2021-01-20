<?php

require 'Modeles/Bdd.php';

final class modeleConnexion {

    public function connexion($pseudo, $mdp) {
        $bdd = new Bdd();
        $bddresult = $bdd->executerReq('SELECT mdp, role FROM utilisateur WHERE pseudo =\'' .$pseudo.'\'');
        $connected = false;
        while($dbRow = $bddresult->fetch(PDO::FETCH_ASSOC)) {
            if (md5($mdp) == $dbRow['mdp']) {
                $_SESSION['etat'] = 'connecte';
                $_SESSION['role'] = $dbRow['role'];
                $_SESSION['pseudo'] = $pseudo;
                $connected = true;
                header('Location: index.php');
            }
        }
        if (!$connected) {
            null;
            header('Location: index.php?c=Connexion&etat=informationsinvalides');
        }
    }

    public function VerificationErreurs($etat) {
        if ($etat == 'informationsinvalides') {
            return 'Les informations rentrées sont invalides';
        }
        else {
            return '';
        }
    }
}
