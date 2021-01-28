<?php 
require 'Modeles/modelePoster.php';
require 'Modeles/modeleAccueil.php';

final class ControleurAccueil
{
    public function Afficher()
    {
		$O_accueil = new ModeleAccueil();
        Vue::montrer('vueAccueil', array('corps' => $O_accueil->getHTML()));
		//Vue::montrer('vueRecherche', array('messages' => call_user_func_array(array($recherche, $tri),array())));
    }


    public function AjouterMsg() {
        Vue::montrer('vueAjoutMsg',array());
    }

    public function Poster(){
        // si le bouton est pressé
        $traitement = new Post;
        $texte = null;
        $image = null;
        $tag = null;
        if (isset($_POST['poster'])) {
            // le chemin pour stocker l'image téléchargée

            if (isset($_FILES['image']['name'])){
                $cible = 'Contenu/Bdd_Images/' . basename($_FILES['image']['name']);
                $image = $_FILES['image']['name']; //récupérer le nom de l'image
                move_uploaded_file($_FILES['image']['tmp_name'], $cible);// déplacer l'image téléchargée dans le dossier: Bdd_images
            }
            if (isset($_POST['tag'])){
                $tag = explode(" ",$_POST['tag']);

            }
            if (isset($_POST['texte']) and strlen($_POST['texte']) > 0 and strlen($_POST['texte']) <= 50){
                $texte = $_POST['texte']; //récupérer le texte
            }
            else {
                echo 'message inexistante ou trop long';
            }

            Vue::montrer('vueAccueil', array($traitement->StockerPost($texte, $image,$tag)));
        }
    }

    public function AfficherPDC()
    {
        Vue::montrer('vuePDC', array());
    }

    public function AfficherCG()
    {
        Vue::montrer('vueCG', array());
    }


}