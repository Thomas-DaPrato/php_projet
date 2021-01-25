<?php

require 'Modeles/modeleRecherche.php';

final class ControleurRecherche
{
	
	public function Afficher()
    {
		$recherche = new Recherche();
		$tri = 'triDefaut';
		if(isset($_GET['tri'])){
			$tri = 'tri' . ucfirst($_GET['tri']);
		}
        Vue::montrer('vueRecherche', array('messages' => call_user_func_array(array($recherche, $tri),array())));

    }

}


