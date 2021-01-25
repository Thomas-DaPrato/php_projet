<section class="a_propos">
    Coucou je m'appelle Vanessa MAUREL, plus connu sous le nom de VANESTARRE. Tu te trouve sur mon petit réseau social. <br/>
    J'éspère que tu aimes me donner de l'argent car j'aime ça. <br/>
    Des bisous trop <em>swag</em>
</section>

<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
    echo '<form action="ajouter_msg.php" method="post">
   <button type="submit">Ajouter un message</button>
</form>';
?>


<!-- Formulaire de contact-->

<section>
	<form action="index.php?" method="get">
		<input type="hidden" name="c" value="Recherche">
		<input type="hidden" name="a" value="Afficher">
		<label><h1>Rechercher</h1></label>
		<input type="search" name="tag" placeholder="&#946;Tag">
		<select name="tri">
			<option value="defaut">defaut</option>
			<option value="recent">recent</option>
		</select>
		<input type="submit" value="loupe">
	</form>
</section>

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



<div id="content">
    <form id="form_image" method="post" action="vueAccueil.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea name="texte" cols="40" rows="4" placeholder="Ecrire un message"></textarea>
        </div>
        <div>
            <button type="submit" name="poster" >POSTER</button>
        </div>
    </form>
</div>

