<?php require 'utils.inc.php';

// Accès aux données
$link = connection('localhost','root','');
mysqli_select_db($link,'projet_web_bd');
$tag = $_POST['rechercher_tag'];
$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $tag . '\'';
if (!($resultRequete = mysqli_query($link,$querry)))
{
    //affichage
    echo 'erreur de requete <br/>';
    echo 'erreur :' .mysqli_error($link) . '<br/>';
    echo 'requete : ' .$querry . '<br/>';
}

// Accès aux données
while ($result = mysqli_fetch_assoc($resultRequete)) {
    echo $result['id_msg'],'<br/>';
    $querryMsg = 'select texte from message where id_msg = \'' . $result['id_msg'] . '\'';
    $msg = mysqli_fetch_assoc(mysqli_query($link, $querryMsg));
    echo $msg['texte'],'<br/>';
}

?>
