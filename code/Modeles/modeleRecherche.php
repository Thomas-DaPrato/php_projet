<?php 
//require '../utils.inc.php';
require 'Bdd.php';


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
		 $this->tag = $_GET['rechercher_tag'];
	 }
	 
	 public function triPas(){
		$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $this->tag . '\'';
		$resultat='';
		$texte='';
		if (!($resultat = $this->bdd->executerReq($querry))){
			//affichage
			$texte =  'erreur de requete <br/>' . PHP_EOL .
			'erreur :' . $this->bdd->errorInfo() . '<br/>' . PHP_EOL .
			'requete : ' . $querry . '<br/>';
		}else{
			while ($result = $resultat->fetch(PDO::FETCH_ASSOC)) {
				$texte .= $result['id_msg'] . '<br/>';
				$querryMsg = 'select texte from message where id_msg = \'' . $result['id_msg'] . '\'' . PHP_EOL;
				$msg = $this->bdd->executerReq($querryMsg);
				$texte .= $msg->fetch(PDO::FETCH_ASSOC)['texte'] . PHP_EOL . '<br/>' . PHP_EOL;
			}
		}
		return $texte;
	 }
	 
	 public function triParDateRecente(){
		 $querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $this->tag . '\'';
	 }
	
}

?>