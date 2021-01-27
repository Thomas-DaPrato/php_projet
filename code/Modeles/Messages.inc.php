<?php


class Messages{
	private $html = ''. PHP_EOL;
	
	public function __construct(){
		
	}
	
	public function addMessage($msg){
		$this->html .= '<article class="msg">' . PHP_EOL;
		$this->html .= '<p>' . PHP_EOL . $msg['texte'] . PHP_EOL . '</p>' . PHP_EOL;
		foreach($msg['tags'] as $tag){
			$this->html .= '<a class="lien_tag" href="index.php?c=Recherche&a=Afficher&tag=' . $tag . '&tri=defaut">&#946;' . $tag . '</a>&ensp;' . PHP_EOL;
		}
		$this->html .= '</article>' . PHP_EOL;
	}

	public function getHTML(){
		return $this->html;
	}
}


?>