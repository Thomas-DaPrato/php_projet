<?php

require 'Modeles/Bdd.php';

final class modeleInscription {
    public function VerificationErreurs($etat){
        if($etat == 'mailinvalide') {
            return 'Le mail entré est déjà utilisé';
        }
        else if ($etat == 'pseudoinvalide') {
            return 'Le pseudo entré est déjà utilisé';
        }
        else if ($etat == 'informationsinvalides') {
            return 'Les informations rentrées sont invalides';
        }
        else if ($etat == 'echec') {
            return 'Une erreur inconnue a eu lieu, veuillez réessayer';
        }
        else {
            return '';
        }
    }

    public function Inscrire ($pseudo, $email, $mdp) {
        $bdd = new Bdd();
        if ($bdd->executerReq('SELECT COUNT(*) FROM utilisateur WHERE mail = \''.$email.'\'')->fetch(PDO::FETCH_ASSOC)['COUNT(*)'] != 0) {
            header('Location: index.php?c=Inscription&etat=mailinvalide');
        }
        else if ($bdd->executerReq('SELECT COUNT(*) FROM utilisateur WHERE pseudo = \''.$pseudo.'\'')->fetch(PDO::FETCH_ASSOC)['COUNT(*)'] != 0) {
            header('Location: index.php?c=Inscription&etat=pseudoinvalide');
        }
        else {
            $requete = 'INSERT INTO utilisateur (mail, pseudo, mdp, role) VALUES (\''
                . $email . '\', \''
                . $pseudo . '\', \''
                . md5($mdp) . '\', \''
                . 'membre' . '\')';
            if (!$bdd->executerReq($requete)) {
                header('Location: index.php?c=Inscription&etat=echec');
            } else {
                $_SESSION['etat'] = 'connecte';
                $_SESSION['role'] = 'membre';
                $_SESSION['pseudo'] = $pseudo;
                $connected = true;
                header('Location: index.php?c=Inscription&a=InscriptionTerminee');
            }
        }

    }
}