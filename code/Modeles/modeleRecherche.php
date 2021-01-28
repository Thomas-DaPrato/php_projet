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
	
	/*
		Effectue une recherche par tag dans l'ordre du plus ancien au plus recent puis renvoie le code html généré
	*/
	public function triDefaut(){
		$querry = 'SELECT id_msg FROM tag WHERE texte_tag = :tagg  LIMIT 10 OFFSET :nbmsg';
		$resultat = $this->bdd->prepare($querry);
		$resultat->bindValue(':tagg', (string) $this->tag, PDO::PARAM_STR);
		$resultat->bindValue(':nbmsg',  (int)($this->page-1) * 10, PDO::PARAM_INT);
		
		$messages = new Messages();
		
		if (!($resultat->execute())){
			return  'erreur de requete <br/>' . PHP_EOL .
			'erreur :' . $this->bdd->errorInfo() . '<br/>' . PHP_EOL .
			'requete : ' . $querry . '<br/>';
		}else{
			$messages->addMessagesById($resultat->fetchAll(PDO::FETCH_COLUMN, 0));
		}
		return $messages->getHTML() . self::getBoutonsPage('defaut');
	}
	
	/*
		Génére un message (tableau associatif) à partir d'un id
	*/
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
	
	/*
		Effectue une recherche par tag dans l'ordre du plus recent au plus ancien puis renvoie le code html généré
	*/
	public function triRecent(){

		$querry = 'SELECT id_msg FROM tag WHERE texte_tag = :tagg ORDER BY id_msg DESC LIMIT 10 OFFSET :nbmsg';
		$resultat = $this->bdd->prepare($querry);
		$resultat->bindValue(':tagg', (string) $this->tag, PDO::PARAM_STR);
		$resultat->bindValue(':nbmsg',  (int)($this->page-1) * 10, PDO::PARAM_INT);
		
		$messages = new Messages();
		if (!($resultat->execute())){
			return  'erreur de requete <br/>' . PHP_EOL .
			'erreur :' . $this->bdd->errorInfo() . '<br/>' . PHP_EOL .
			'requete : ' . $querry . '<br/>';
		}else{
			$messages->addMessagesById($resultat->fetchAll(PDO::FETCH_COLUMN, 0));
		}
		return $messages->getHTML() . self::getBoutonsPage('recent');
	}
	
	/*
		Génére un code html contenant des boutons permettant de changé de page
	*/
	private function getBoutonsPage($tri){
		$html = PHP_EOL . '<a class="bouton_page" href="index.php?c=Recherche&a=Afficher&tag=' . $this->tag . '&tri=' . $tri . '&page=1">First</a>' . PHP_EOL;
		$querry = 'SELECT count(*) FROM tag WHERE texte_tag = :tagg';
		$resultat = $this->bdd->prepare($querry);
		$resultat->bindValue(':tagg', (string) $this->tag, PDO::PARAM_STR);
		$resultat->execute();
		$nbMessage = intval($resultat->fetch(PDO::FETCH_ASSOC)['count(*)']);
		
		if($this->page <= 1){
			$html .= '<a class="bouton_page" href="index.php?c=Recherche&a=Afficher&tag=' . $this->tag . '&tri=' . $tri . '&page=1" disabled>←</a>' . PHP_EOL;
		}else{
			$html .= '<a class="bouton_page" href="index.php?c=Recherche&a=Afficher&tag=' . $this->tag . '&tri=' . $tri . '&page=' . strval($this->page - 1) . '">←</a>' . PHP_EOL;
		}
		if($this->page >= intdiv($nbMessage,10) + 1){
			$html .= '<a class="bouton_page" href="index.php?c=Recherche&a=Afficher&tag=' . $this->tag . '&tri=' . $tri . '&page=' . strval(intdiv($nbMessage,10) + 1) . '" disabled>→</a>' . PHP_EOL;
		}else{
			$html .= '<a class="bouton_page" href="index.php?c=Recherche&a=Afficher&tag=' . $this->tag . '&tri=' . $tri . '&page=' . strval($this->page + 1) . '">→</a>' . PHP_EOL;
		}
		$html .= '<a class="bouton_page" href="index.php?c=Recherche&a=Afficher&tag=' . $this->tag . '&tri=' . $tri . '&page=' . strval(intdiv($nbMessage,10) + 1) . '">last</a>' . PHP_EOL;
		return $html;
	}
	
}

?>