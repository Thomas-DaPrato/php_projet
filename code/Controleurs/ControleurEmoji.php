<?php
require 'Modeles/modeleEmoji.php';
class ControleurEmoji {

    public function Increment()
    {
        if (isset($_SESSION['pseudo']))
        {
            $emoji = null;
            $id_msg = null;

            if (isset($_GET['incrementEmoji'])){
                $emoji = $_GET['incrementEmoji'];
            }

            if (isset($_GET['id_msg'])){
                $id_msg = $_GET['id_msg'];
            }
            $ajouter = new Emoji();

            switch ($emoji) {
                case 'love' :
                    $ajouter->addLove($id_msg);
                    break;
                case 'cute' :
                    $ajouter->addCute($id_msg);
                    break;
                case 'trop_style' :
                    $ajouter->addTrop_style($id_msg);
                    break;
                case 'swag' :
                    $ajouter->addSwag($id_msg);
                    break;
                default :
                    echo 'pas possible';
            }

            Vue::montrer('vueAccueil', array());
        }
        else {
            echo 'connectez vous pour réagir !!';
        }
    }
}
