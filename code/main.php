<?php require 'utils.inc.php';
start_page('VANESTARRE');
?>
<button type="submit" name="action" value="connexion">Connexion</button>
<form action="recherche_tag.php" method="post">
    <input type="text" name="tag">
    <button type="submit" name="rechercher_tag">Rechercher</button>
</form>
<?php end_page();?>

