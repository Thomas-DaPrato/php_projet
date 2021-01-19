<?php
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
    $dbResult = mysqli_query($dbLink, 'SELECT mdp, role, pseudo FROM utilisateur WHERE pseudo =\'' .$nom.'\'');
    $connected = false;
    while($dbRow = mysqli_fetch_assoc($dbResult)) {
        if (md5($mdp) == $dbRow['mdp']) {
            $_SESSION['etat'] = 'connecte';
            $_SESSION['role'] = $dbRow['role'];
            $_SESSION['pseudo'] = $dbRow['pseudo'];
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
    if (mysqli_query($dbLink, 'SELECT COUNT(*) FROM utilisateur WHERE email = \''.$email.'\'')) {
        header('Location: inscription.php?etat=mailinvalide');
    }
    if (mysqli_query($dbLink, 'SELECT COUNT(*) FROM utilisateur WHERE pseudo = \''.$nom.'\'')) {
        header('Location: inscription.php?etat=pseudoinvalide');
    }
    else {
        $query = 'INSERT INTO utilisateur (mail, pseudo, mdp, role) VALUES (\''
            . $email . '\', \''
            . $nom . '\', \''
            . md5($mdp) . '\', \''
            . 'membre' . '\')';
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            header('Location: inscription.php?etat=echec');
        } else {
            $_SESSION['etat'] = 'connecte';
            $_SESSION['role'] = 'membre';
            $_SESSION['pseudo'] = $nom;
            $connected = true;
            echo 'Bienvenue ' . $nom . ', votre requête a bien été enregistrée ! <br/>
            <a href = main.php> Retour à la page d\'accueil</a>';
        }
    }
}
?>
