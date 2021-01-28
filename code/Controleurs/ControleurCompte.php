<?php


class ControleurCompte
{
    public function Afficher() { //affichage de la page de gestion de compte
        Vue::montrer('Connexion_et_inscription/vueCompte', array());
    }

    public function Deconnexion() {
        $compte = new modeleCompte();
        $compte->Deconnexion();
        header('location: index.php');
    }

    public function Suppression() {
        //Verification que l'on est pas arrivé sur cette page sans passer par la vérification, et que celle ci est juste
        if (isset($_POST['verif']) && $_POST['verif'] == $_SESSION['pseudo']) {
            $compte = new modeleCompte();
            $compte->SupprimerCompte();
            Vue::montrer('Connexion_et_inscription/vueSuppressionTerminee', array());
        }
        else if (isset($_POST['verif'])) {
            Vue::montrer('Connexion_et_inscription/vueSuppression', array('erreur' => 'Le pseudo rentré n\'est pas valide'));
        }
        else {
            Vue::montrer('Connexion_et_inscription/vueSuppression', array('erreur' => ''));
        }
    }
}