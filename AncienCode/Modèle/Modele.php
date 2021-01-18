<?php
// Accès aux données
$link = connection('localhost','root','');
mysqli_select_db($link,'projet_web_bd');
$tag = $_POST['rechercher_tag'];
$querry = 'SELECT id_msg FROM tag WHERE texte_tag = \'' . $tag . '\'';

// Accès aux données
while ($result = mysqli_fetch_assoc($resultRequete)) {
    echo $result['id_msg'],'<br/>';
    $querryMsg = 'select texte from message where id_msg = \'' . $result['id_msg'] . '\'';
    $msg = mysqli_fetch_assoc(mysqli_query($link, $querryMsg));
    echo $msg['texte'],'<br/>';
}

// Accès aux données
$nom = $_POST['pseudo'];
$email = '';
if (isset($_POST['email']))
    $email = $_POST['email'];
$mdp = $_POST['mdp'];
$action = $_POST['action'];
if (isset($_POST['verificationmdp'])) {
    $verificationmdp = $_POST['verificationmdp'];
}

$dbLink = mysqli_connect('localhost', 'root', '')
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
mysqli_select_db($dbLink , 'projet_web_bd')
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

if ($action == 'connexion') {
    session_start();
    $dbResult = mysqli_query($dbLink, 'SELECT mdp, role FROM utilisateur WHERE pseudo =\'' .$nom.'\'');
    $connected = false;
    while($dbRow = mysqli_fetch_assoc($dbResult)) {
        if (md5($mdp) == $dbRow['mdp']) {
            $_SESSION['etat'] = 'connecte';
            $_SESSION['role'] = $dbRow['role'];
            $connected = true;
            header('Location: accueil.php');
        }
    }
    if (!$connected) {
        header('Location: connexion.php?etat=echec');
    }
}
else if ($action == 'inscription') {
    $dbLink = mysqli_connect('localhost', 'root', '')
    or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    mysqli_select_db($dbLink , 'projet_web_bd')
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
    $query = 'INSERT INTO utilisateur (mail, pseudo, mdp, role) VALUES (\''
        . $email . '\', \''
        . $nom . '\', \''
        . md5($mdp) . '\', \''
        . 'membre' . '\')';
    if(!($dbResult = mysqli_query($dbLink, $query))) {
        header('Location: inscription.php?etat=echec');
    }
    else {
        $_SESSION['etat'] = 'connecte';
        $_SESSION['role'] = 'membre';
        $connected = true;}
}

// Accès aux données
function connection($hostname, $username, $pwd)
{
    if (!($dbLink = mysqli_connect($hostname, $username, $pwd)))
        die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    return $dbLink;
}

// Accès aux données
$link = connection('localhost','root','');
mysqli_select_db($link,'projet_web_bd');
$querry = 'SELECT texte, id_msg from message';