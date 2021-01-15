<?php require 'utils.inc.php';
require 'connection_BD.php';
start_page('VANESTARRE');
$link = connection('localhost','root','');
mysqli_select_db($link,'projet_web_bd');
$querry = 'select texte from message';
if (!($resultRequete = mysqli_query($link,$querry)))
{
    echo 'erreur de requete <br/>';
    echo 'erreur :' .mysqli_error($link) . '<br/>';
    echo 'requete : ' .$querry . '<br/>';
}

echo '<div class="container_msg">';
while ($result = mysqli_fetch_assoc($resultRequete))
{
    echo '<div class="msg">';
    echo $result['texte'], '<br/>';
    echo '</div>';
}
echo 'ici ya tous les messages présent sur le réseau social';
echo '</div>';
?>



<form action="recherche_tag.php" method="post">
    <input type="text" name="rechercher_tag" placeholder="tag" required>
    <button type="submit" name="recherche">Ok</button>
</form>
<?php end_page();?>

