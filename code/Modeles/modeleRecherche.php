<?php 
require 'Bdd.php';
require 'Messages.inc.php';

final class Recherche{
	private $bdd;
	private $tag;
	private $page;
	
	public function __construct (){
		$this->bdd = new Bdd();
		if(isset($_GET['tag'])){
			$this->tag = $_GET['tag'];
		}else{
			$this->tag = ' '; 
		}
		if(isset($_GET['page'])){
			$this->page = intval($_GET['page']);
			if($this->page <= 0)$this->page = 1;
		}else{
			$this->page = 1;
		}
	}
	
	public function triDefaut(){
		$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $this->tag . '\'  LIMIT 10 OFFSET ' . ($this->page - 1)*10 . '';
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
		$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $this->tag . '\' ORDER BY id_msg DESC LIMIT 10 OFFSET ' . ($this->page - 1)*10 . '';
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