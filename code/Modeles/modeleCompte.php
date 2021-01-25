<?php


final class modeleCompte
{
    public function SupprimerCompte () {
        $bdd = new Bdd();
        $bdd->getBdd();
        $stmt = $bdd->prepare('DELETE FROM utilisateur WHERE pseudo = ?');
        $stmt->execute(array($_SESSION['pseudo']));
    }
}