<?php

require_once 'Bdd.php';

class Messages{
	private $html = ''. PHP_EOL;
	private $bdd;
	
	
	
	public function __construct(){
		$this->bdd = new Bdd();
	}
	
	
	/*
		Permet d'ajouter un message (un tableau associatif) dans le code html
	*/
	public function addMessage($msg){
		$this->html .= '            <article class="msg">' . PHP_EOL;
		$this->html .= '                <h6>titre</h6>'.PHP_EOL;
		$this->html .= '                <p>' . PHP_EOL . '                    '. $msg['texte'] . PHP_EOL . '                </p>' . PHP_EOL . PHP_EOL;


		foreach($msg['images'] as $img){
			$this->html .= '                <img class="image_msg" src="Contenu/Bdd_Images/' . $img .'" alt="image" ><br/><br/>' . PHP_EOL;
		}
        foreach($msg['tags'] as $tag){
            $this->html .= '                    <a class="lien_tag" href="index.php?c=Recherche&a=Afficher&tag=' . $tag . '&tri=defaut">&#946;' . $tag . '</a>&ensp;' . PHP_EOL . PHP_EOL;
        }
		$this->html .= '                <form action="index.php?" method="get">' . PHP_EOL
              . '                   <input type="hidden" name="c" value="Emoji">' . PHP_EOL
              . '                   <input type="hidden" name="a" value="Increment">' .PHP_EOL
              . '                   <input type="hidden" name="id_msg" value="' . $msg['id_msg'] . '">' . PHP_EOL;
			  
		$this->html .= '                   <button type="submit" class="boutonEmoji" name="incrementEmoji" value="love">' . PHP_EOL;
		$this->html .= '                       <img class="emoji" src="Contenu/Images/emoji_love.png" alt="emoji_love"> : ' . $msg['emoji']['love'] . PHP_EOL . '                   </button>' . PHP_EOL;
		
		$this->html .= '                   <button type="submit" class="boutonEmoji" name="incrementEmoji" value="cute">' . PHP_EOL;
		$this->html .= '                       <img class="emoji" src="Contenu/Images/emoji_cute.png" alt="emoji_cute"> : ' . $msg['emoji']['cute'] . PHP_EOL . '                   </button>' . PHP_EOL;
		
		$this->html .= '                   <button type="submit" class="boutonEmoji" name="incrementEmoji" value="trop_style">' . PHP_EOL;
		$this->html .= '                       <img class="emoji" src="Contenu/Images/emoji_trop_style.png" alt="emoji_trop_style"> : ' . $msg['emoji']['trop_style'] . PHP_EOL . '                   </button>' . PHP_EOL;
		
		$this->html .= '                   <button type="submit" class="boutonEmoji" name="incrementEmoji" value="swag">' . PHP_EOL;
		$this->html .= '                       <img class="emoji" src="Contenu/Images/emoji_swag.png" alt="emoji_swag"> : ' . $msg['emoji']['swag'] . PHP_EOL . '                   </button>' . PHP_EOL;
		
		
		$this->html .= '                </form>' . PHP_EOL .'           </article>' . PHP_EOL . PHP_EOL;
	}
	
	/*
		Renvoie un message (un tableau associatif) à partir de l'id donné
	*/
	public function getMessageById($id){
		$message = array();
		
		$message['id_msg'] = $id;
		
		$querryMsg = 'select texte from message where id_msg = \'' . $id . '\'';
		$res = $this->bdd->executerReq($querryMsg);
		$message['texte'] = $res->fetch(PDO::FETCH_ASSOC)['texte'];
		
		$message['tags'] = array();
		$querryMsg = 'select texte_tag from tag where id_msg = \''. $id . '\'';
		$res = $this->bdd->executerReq($querryMsg);
		
		while($texte_tag = $res->fetch(PDO::FETCH_ASSOC)){
			$message['tags'][] = $texte_tag['texte_tag'];
		}
		
		$message['images'] = array();
		$querryMsg = 'select image from images where id_msg=' . $id;
		$res = $this->bdd->executerReq($querryMsg);
		while($image = $res->fetch(PDO::FETCH_ASSOC)){
			$message['images'][] = $image['image'];
		}
		
		$message['emoji'] = array();
		
		$querryMsg = 'SELECT count(*) FROM reaction WHERE id_msg = ' . $id . ' AND emoji = :emo';
		$emo = 'love';
		$stmt = $this->bdd->prepare($querryMsg);
		$stmt->bindParam(':emo', $emo, PDO::PARAM_STR);
		
		$stmt->execute();
		$message['emoji']['love'] = $stmt->fetch()['count(*)'];
		
		$emo = 'cute';
		$stmt->execute();
		$message['emoji']['cute'] = $stmt->fetch()['count(*)'];
		
		$emo = 'trop_style';
		$stmt->execute();
		$message['emoji']['trop_style'] = $stmt->fetch()['count(*)'];
		
		$emo = 'swag';
		$stmt->execute();
		$message['emoji']['swag'] = $stmt->fetch()['count(*)'];
		
		return $message;
	}
	
	/*
		Permet d'ajouter plusieur messages dans le code html en passant un tableau d'id
	*/
	public function addMessagesById($ids_msg){
		foreach($ids_msg as $id){
			self::addMessage(self::getMessageById($id));
		}
	}

	/*
		Renvoie le code html généré
	*/
	public function getHTML(){
		return $this->html;
	}
}


?>