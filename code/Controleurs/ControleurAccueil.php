<?php

final class ControleurAccueil
{
    public function Afficher()
    {
        Vue::montrer('vueAccueil', array());
    }

    public function Poster(){
        // si le bouton est pressé
        $traitement = new Post;
        if (isset($_POST['poster'])){
            // le chemin pour stocker l'image téléchargée
            $cible = '../Contenu/Bdd_Images/' .basename($_FILES['image']['name']);
            $image = $_FILES['image']['name']; //récupérer le nom de l'image
            $texte = $_POST['texte']; //récupérer le texte de l'image
            Vue::montrer('vueAccueil', array($traitement->));

            move_uploaded_file($_FILES['image']['tmp_name'], $cible);// déplacer l'image téléchargée dans le dossier: Bdd_images
    }

}