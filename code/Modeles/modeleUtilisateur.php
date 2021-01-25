<?php
final class modeleUtilisateur {
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

    public function Inscription ($pseudo, $email, $mdp) {
        //Ouverture de la bdd
        $bdd = new Bdd();
        $bdd->getBdd();
        //Verification de l'unicité du pseudo et du mail
        $dejainscrit = false;
        $stmt = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE mail = ?');
        $stmt->execute(array($email));
        if ($stmt->fetch(PDO::FETCH_ASSOC)['COUNT(*)'] != 0) {
            header('Location: index.php?c=Utilisateur&a=AfficherInscription&etat=mailinvalide');
            $dejainscrit = true;
        }
        $stmt = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE pseudo = ?');
        $stmt->execute(array($pseudo));
        if (!$dejainscrit && $stmt->fetch(PDO::FETCH_ASSOC)['COUNT(*)'] != 0) {
            header('Location: index.php?c=Utilisateur&a=afficherInscription&etat=pseudoinvalide');
            $dejainscrit = true;
        }

        //Inscription si les pseudo et mail sont uniques
        if (!$dejainscrit) {
            $stmt = $bdd->prepare('INSERT INTO utilisateur (mail, pseudo, mdp, role) VALUES (?, ?, ?, ?)');
            $stmt->execute(array($email, $pseudo, md5($mdp), 'membre'));
            $_SESSION['role'] = 'membre';
            $_SESSION['pseudo'] = $pseudo;
            $connected = true;
            header('Location: index.php?c=Utilisateur&a=InscriptionTerminee');
        }

    }

    public function connexion($pseudo, $mdp) {
        $bdd = new Bdd();
        $bdd->getBdd();
        $stmt = $bdd->prepare('SELECT mdp, role FROM utilisateur WHERE pseudo =?');
        $stmt->execute(array($pseudo));
        $connected = false;
        while($dbRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (md5($mdp) == $dbRow['mdp']) {
                $_SESSION['role'] = $dbRow['role'];
                $_SESSION['pseudo'] = $pseudo;
                $connected = true;
                header('Location: index.php');
            }
        }
        if (!$connected) {
            null;
            header('Location: index.php?c=Utilisateur&etat=informationsinvalides');
        }
    }


}