<section class="a_propos">
    Coucou je m'appelle Vanessa MAUREL, plus connu sous le nom de VANESTARRE. Tu te trouve sur mon petit réseau social. <br/>
    J'éspère que tu aimes me donner de l'argent car j'aime ça. <br/>
    Des bisous trop <em>swag</em>
</section>


<div class="container_msg">

<?php
if (isset($A_vue['corps']))
{
    echo $A_vue['corps'];
}

?>
</div>
<section class="rechercheTag">
	<form  action="index.php?" method="get">
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





