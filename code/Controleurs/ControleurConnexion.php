<?php

final class ControleurConnexion
{
    public function Afficher()
    {
        $traitement = new modeleConnexion();
        Vue::montrer('vueConnexion', array('etat' => isset($_GET['etat'])? $traitement->VerificationErreurs($_GET['etat']) : null));
    }

    public function Connexion()
    {
        $traitement = new modeleConnexion();
        if (!isset($_POST['pseudo']) || !isset($_POST['mdp'])){
            header('Location: index.php?c=Connexion&etat=informationsinvalides');
        }
        else {
            $traitement->Connexion($_POST['pseudo'], $_POST['mdp']);
        }
    }
}




