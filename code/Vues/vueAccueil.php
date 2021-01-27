<section class="a_propos">
    Coucou je m'appelle Vanessa MAUREL, plus connu sous le nom de VANESTARRE. Tu te trouve sur mon petit réseau social. <br/>
    J'éspère que tu aimes me donner de l'argent car j'aime ça. <br/>
    Des bisous trop <em>swag</em>
</section>

<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
    echo '<form action="index.php?method="get">
          <input type="hidden" name="c" value="Accueil">
		  <input type="hidden" name="a" value="AjouterMsg">
   <button type="submit">Ajouter un message</button>
</form>';
?>

<div class="container_msg">
<?php
$bdd = new Bdd();
$querry = 'SELECT id_msg,texte,nb_love,nb_cute,nb_trop_style,nb_swag from message ORDER BY id_msg desc';
$message = array();
$resultat = $bdd->executerReq($querry);
while ($message = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<article class="msg"><br/>',$message['texte'],'<br/><br/>';
    $querryTag = 'SELECT texte_tag from tag where id_msg='.$message['id_msg'];
    $resultatTag = $bdd->executerReq($querryTag);
    $message['tags'] = array();
    while($texte_tag = $resultatTag->fetch(PDO::FETCH_ASSOC)){
        $message['tags'][] = $texte_tag['texte_tag'];
    }
    foreach ($message['tags'] as $tag) {
        echo '<a class="lien_tag" href="index.php?c=Recherche&a=Afficher&tag=' . $tag . '&tri=defaut">&#946;' . $tag . '</a>&ensp;';
    }
    $message['images'] = null;
    $querryImg = 'select image from images where id_msg='.$message['id_msg'];
    $resultatImg = $bdd->executerReq($querryImg);
    while($image = $resultatImg->fetch(PDO::FETCH_ASSOC)){
        $message['images'] = $image['image'];
    }
    echo '<br/><br/>';
    if (!($message['images'] == null)){
        echo '<img src="Contenu/Bdd_Images/'. $message['images'].'"alt="image" width = 25% height=25%><br/><br/>';
    }
    echo '<form action="index.php?" method="get">
              <input type="hidden" name="c" value="Emoji">
		      <input type="hidden" name="a" value="Increment">
		      <input type="hidden" name="id_msg" value="'.$message['id_msg'].'">
              <button type="submit" class="boutonEmoji" name="incrementEmoji" value="love"><img class="emoji" src="Contenu/Images/emoji_love.png" alt="emoji_love" ></button> :'. $message['nb_love'].'
              <button type="submit" class="boutonEmoji" name="incrementEmoji" value="cute"><img class="emoji" src="Contenu/Images/emoji_cute.png" alt="emoji_cute" ></button> :'. $message['nb_cute'].'
              <button type="submit" class="boutonEmoji" name="incrementEmoji" value="trop_style"><img class="emoji" src="Contenu/Images/emoji_trop_stylé.png" alt="emoji_trop_stylé" ></button> : '. $message['nb_trop_style'].'
              <button type="submit" class="boutonEmoji" name="incrementEmoji" value="swag"><img class="emoji" src="Contenu/Images/emoji_swag.png" alt="emoji_swag" ></button> : '. $message['nb_swag'].'
          </form>
            
          
          </article>';

}
?>
</div>
<section>
	<form class="rechercheTag" action="index.php?" method="get">
		<input type="hidden" name="c" value="Recherche">
		<input type="hidden" name="a" value="Afficher">
		<input type="hidden" name="page" value="1">
		<label><h1>Rechercher</h1></label>
		<input type="search" name="tag" placeholder="&#946;Tag">
		<select name="tri">
			<option value="defaut">defaut</option>
			<option value="recent">recent</option>
		</select>
		<input type="submit" value="loupe">
	</form>
</section>

<!-- Formulaire de contact-->
<h1>Contact</h1>
<form class="cf" action="#" method="post">
    <div class="moitié-gauche-cf">
        <input type="text" id="input-nom" placeholder="Prénom Nom">
        <input type="email" id="input-email" placeholder="Email">
        <input type="text" id="input-sujet" placeholder="Sujet">
    </div>
    <div class="moitié-droite-cf">
        <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
    </div>
    <input type="submit" name="action" value="Envoyer" id="input-submit">
</form>




