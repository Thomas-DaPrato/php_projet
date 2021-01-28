<?php
require_once 'Messages.inc.php';
require_once 'Bdd.php';

final class ModeleAccueil{
	private $html = '';
	private $bdd;
	public function __construct (){
		if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
			$this->html .= PHP_EOL . '<form  action="index.php?" method="get">' . PHP_EOL
				. '<input type="hidden" name="c" value="Accueil">' . PHP_EOL
				. '<input type="hidden" name="a" value="AjouterMsg">' . PHP_EOL
				. '<button class="btn_ajout_msg" type="submit">Ajouter un message</button>' . PHP_EOL
				. '</form>' . PHP_EOL;
		}
		$this->bdd = new Bdd();
		self::displayMessages();
	}
	
	public function getHTML(){
		return $this->html;
	}
	
	private function displayMessages(){
		$messages = new Messages();
		$querry = 'SELECT id_msg from message ORDER BY id_msg desc';
		$resultat = $this->bdd->executerReq($querry);
		$messages->addMessagesById($resultat->fetchAll(PDO::FETCH_COLUMN, 0));
		$this->html .= $messages->getHTML();
	}
	
}

?>