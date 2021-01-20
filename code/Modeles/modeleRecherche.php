<?php 
require 'Bdd.php';
require 'Messages.inc.php';

final class Recherche{
	private $bdd;
	private $tag;
	
	public function __construct (){
		$this->bdd = new Bdd();
		if(isset($_GET['rechercher_tag'])){
			$this->tag = $_GET['rechercher_tag'];
		}else{
			$this->tag = ' '; 
		}
	}
	
	public function triDefaut(){
		$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $this->tag . '\'';
		$resultat='';
		$messages = new Messages();
		if (!($resultat = $this->bdd->executerReq($querry))){
			return  'erreur de requete <br/>' . PHP_EOL .
			'erreur :' . $this->bdd->errorInfo() . '<br/>' . PHP_EOL .
			'requete : ' . $querry . '<br/>';
		}else{
			while ($result = $resultat->fetch(PDO::FETCH_ASSOC)) {
				$messages->addMessage(self::getMessageByID($result['id_msg']));
			}
		}
		return $messages->getHTML();
	}
	
	private function getMessageByID($id){
		$message = array();
		$querryMsg = 'select texte from message where id_msg = \'' . $id . '\'';
		$res = $this->bdd->executerReq($querryMsg);
		$message['texte'] = $res->fetch(PDO::FETCH_ASSOC)['texte'];
		
		$message['tags'] = array();
		$querryMsg = 'select texte_tag from tag where id_msg = \''. $id . '\'';
		$res = $this->bdd->executerReq($querryMsg);
		
		while($texte_tag = $res->fetch(PDO::FETCH_ASSOC)){
			$message['tags'][] = $texte_tag['texte_tag'];
		}
		
		return $message;
	}
	
	public function triRecent(){
		$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $this->tag . '\' ORDER BY id_msg DESC';
		$resultat='';
		$messages = new Messages();
		if (!($resultat = $this->bdd->executerReq($querry))){
			return  'erreur de requete <br/>' . PHP_EOL .
			'erreur :' . $this->bdd->errorInfo() . '<br/>' . PHP_EOL .
			'requete : ' . $querry . '<br/>';
		}else{
			while ($result = $resultat->fetch(PDO::FETCH_ASSOC)) {
				$messages->addMessage(self::getMessageByID($result['id_msg']));
			}
		}
		return $messages->getHTML();
	}
	
}

?>