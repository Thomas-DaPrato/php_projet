<?php
    final class ControleurUtilisateur {
        public function Afficher()
        {
            $traitement = new modeleUtilisateur();
            Vue::montrer('Connexion_et_inscription/vueConnexion', array('etat' => isset($_GET['etat'])? $traitement->VerificationErreurs($_GET['etat']) : null));
        }

        public function Connexion()
        {
            $traitement = new modeleUtilisateur();
            if (!isset($_POST['pseudo']) || !isset($_POST['mdp'])){
                //Vérification de la présence d'un pseudo et d'un mdp
                header('Location: index.php?c=Utilisateur&etat=informationsinvalides');
            }
            else {
                $traitement->Connexion($_POST['pseudo'], $_POST['mdp']);
            }
        }

        public function AfficherInscription()
        {
            //Page d'Inscription
            $traitement = new modeleUtilisateur();
            Vue::montrer('Connexion_et_inscription/vueInscription', array('etat' => isset($_GET['etat'])? $traitement->VerificationErreurs($_GET['etat']) : null));
        }

        public function InscriptionTerminee()
        {
            //Page de fin d'inscription
            Vue::montrer('Connexion_et_inscription/vueInscriptionTerminee', array());
        }

        public function Inscription()
        {
            //Gestion de l'inscription
            $traitement = new modeleUtilisateur();
            if (!isset($_POST['pseudo']) || !isset($_POST['email']) || !isset($_POST['mdp'])){
                //Vérification de l'existence du pseudo, mot de passe et mail -> si ils n'existent pas, renvoient sur la page précédente
                header('Location: index.php?c=Utilisateur&a=AfficherInscription&etat=informationsinvalides');
            }
            else {
                $traitement->Inscription($_POST['pseudo'], $_POST['email'], $_POST['mdp']);
            }
        }
    }