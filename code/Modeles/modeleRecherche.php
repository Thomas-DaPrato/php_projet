<?php 
//require '../utils.inc.php';
require 'Bdd.php';
require 'Messages.inc.php';


// Accès aux données
//$link = connection('localhost','root','');
//mysqli_select_db($link,'projet_web_bd');
//$tag = $_POST['rechercher_tag'];
//$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $tag . '\'';
// if (!($resultRequete = mysqli_query($link,$querry)))
// {
    // //affichage
    // echo 'erreur de requete <br/>';
    // echo 'erreur :' .mysqli_error($link) . '<br/>';
    // echo 'requete : ' .$querry . '<br/>';
// }

// // Accès aux données
// while ($result = mysqli_fetch_assoc($resultRequete)) {
    // echo $result['id_msg'],'<br/>';
    // $querryMsg = 'select texte from message where id_msg = \'' . $result['id_msg'] . '\'';
    // $msg = mysqli_fetch_assoc(mysqli_query($link, $querryMsg));
    // echo $msg['texte'],'<br/>';
// }

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