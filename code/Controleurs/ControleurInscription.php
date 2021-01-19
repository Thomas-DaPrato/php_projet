<?php


final class ControleurInscription
{
    public function Afficher()
    {
        $traitement = new modeleInscription();
        Vue::montrer('vueInscription', array('etat' => isset($_GET['etat'])? $traitement->VerificationErreurs($_GET['etat']) : null));
    }

    public function InscriptionTerminee()
    {
        Vue::montrer('vueInscriptionTerminee', array());
    }

    public function Traitement()
    {
        $traitement = new modeleInscription();
        if (!isset($_POST['pseudo']) || !isset($_POST['email']) || !isset($_POST['mdp'])){
            header('Location: index.php?c=Inscription&etat=informationsinvalides');
        }
        else {
            $traitement->Inscrire($_POST['pseudo'], $_POST['email'], $_POST['mdp']);
        }
    }
}