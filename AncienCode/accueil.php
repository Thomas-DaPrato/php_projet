<?php require 'utils.inc.php';
start_page('VANESTARRE');

// Accès aux données
$link = connection('localhost','root','');
mysqli_select_db($link,'projet_web_bd');
$querry = 'SELECT texte, id_msg from message';
if (!($resultRequete = mysqli_query($link,$querry)))
{
    echo 'erreur de requete <br/>';
    echo 'erreur :' .mysqli_error($link) . '<br/>';
    echo 'requete : ' .$querry . '<br/>';
}

//Affichage
echo '<div class="container_msg">';
while ($result = mysqli_fetch_assoc($resultRequete))
{
    echo '<div class="msg">';
    echo $result['texte'],'<br/>';
    echo '</div>';
}
echo 'ici ya tous les messages présent sur le réseau social';
echo '</div>';
?>


//affichage
<form action="assets/php/recherche_tag.php" method="post">
    <input type="text" name="rechercher_tag" placeholder="tag" required>
    <button type="submit" name="recherche">Ok</button>
</form>
<?php end_page();?>

