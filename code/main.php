<?php require 'utils.inc.php';
start_page('VANESTARRE');
?>
<button type="submit" name="action" value="connexion"><a href="login.php">Connexion</a></button>
ici ya tous les messages présent sur le réseau social

<form action="recherche_tag.php" method="post">
    <input type="text" name="rechercher_tag" placeholder="tag">
    <button type="submit" name="recherche">Ok</button>
</form>
<?php end_page();?>

