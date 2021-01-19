<?php

require 'Modeles/modeleRecherche.php';

final class ControleurRecherche
{
	
	public function Afficher()
    {
		$recherche = new Recherche();
        Vue::montrer('vueRecherche', array('messages' => $recherche->triPas()));

    }

}


