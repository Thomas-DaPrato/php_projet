<?php


class ControleurCompte
{
    public function Afficher() {
        Vue::montrer('Connexion_et_inscription/vueCompte', array());
    }

    public function Deconnexion() {
        $_SESSION['role'] = null;
        $_SESSION['pseudo'] = null;
        header('location: index.php');
    }

    public function Suppression() {
        if (isset($_POST['verif']) && $_POST['verif'] == $_SESSION['pseudo']) {
            $compte = new modeleCompte();
            $compte->SupprimerCompte();
            $_SESSION['role'] = null;
            $_SESSION['pseudo'] = null;
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