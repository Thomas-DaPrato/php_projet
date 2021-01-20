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




