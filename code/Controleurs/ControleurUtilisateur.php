<?php
    final class ControleurUtilisateur {
        public function Afficher()
        {
            $traitement = new modeleUtilisateur();
            Vue::montrer('vueConnexion', array('etat' => isset($_GET['etat'])? $traitement->VerificationErreurs($_GET['etat']) : null));
        }

        public function Connexion()
        {
            $traitement = new modeleUtilisateur();
            if (!isset($_POST['pseudo']) || !isset($_POST['mdp'])){
                header('Location: index.php?c=Utilisateur&etat=informationsinvalides');
            }
            else {
                $traitement->Connexion($_POST['pseudo'], $_POST['mdp']);
            }
        }

        public function AfficherInscription()
        {
            $traitement = new modeleUtilisateur();
            Vue::montrer('vueInscription', array('etat' => isset($_GET['etat'])? $traitement->VerificationErreurs($_GET['etat']) : null));
        }

        public function InscriptionTerminee()
        {
            Vue::montrer('vueInscriptionTerminee', array());
        }

        public function Inscription()
        {
            $traitement = new modeleUtilisateur();
            if (!isset($_POST['pseudo']) || !isset($_POST['email']) || !isset($_POST['mdp'])){
                header('Location: index.php?c=Utilisateur&a=AfficherInscription&etat=informationsinvalides');
            }
            else {
                $traitement->Inscription($_POST['pseudo'], $_POST['email'], $_POST['mdp']);
            }
        }
    }