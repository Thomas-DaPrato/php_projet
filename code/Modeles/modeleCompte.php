<?php


final class modeleCompte
{
    public function Deconnexion() {
        $_SESSION['role'] = null;
        $_SESSION['pseudo'] = null;
    }


    public function SupprimerCompte () {
        $bdd = new Bdd();
        $bdd->getBdd();
        $stmt = $bdd->prepare('DELETE FROM utilisateur WHERE pseudo = ?');
        $stmt->execute(array($_SESSION['pseudo']));
        $this->Deconnexion();
    }
}