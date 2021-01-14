<?php require 'connection_BD.php';
$link = connection('localhost','root','');
mysqli_select_db($link,'projet_web_bd');
$tag = $_POST['rechercher_tag'];
$querry = 'SELECT id_msg from tag where \'texte_tag = ' . $tag . '\'';
if (!($resultRequete = mysqli_query($link,$querry)))
{
    echo 'erreur de requete <br/>';
    echo 'erreur :' .mysqli_error($link) . '<br/>';
    echo 'requete : ' .$querry . '<br/>';
}

while ($result = mysqli_fetch_assoc($resultRequete))
{
    echo 'coucou';
    echo $result['id_msg'];
}
?>
