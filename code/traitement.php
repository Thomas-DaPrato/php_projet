<?php
$nom = $_POST['pseudo'];
$email = '';
if (isset($_POST['email']))
    $email = $_POST['email'];
$mdp = $_POST['mdp'];
$action = $_POST['action'];
$verificationmdp = $_POST['verificationmdp'];


$dbLink = mysqli_connect('localhost', 'root', '')
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
mysqli_select_db($dbLink , 'user')
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

if ($action == 'connexion') {
    session_start();
    $dbResult = mysqli_query($dbLink, 'SELECT password, role FROM user WHERE nom =\'' .$pseudo.'\'');
    $connected = false;
    while($dbRow = mysqli_fetch_assoc($dbResult)) {
        if (md5($mdp) == $dbRow['password']) {
            $_SESSION['etat'] = 'connecte';
            $_SESSION['role'] = $dbRow['role'];
            $connected = true;
            header('Location: main.php');
        }
    }
    if (!$connected) {
        header('Location: login.php?etat=CONNEXIONECHOUEE');
    }
}
else if ($action == 'inscription') {
    $dbLink = mysqli_connect('localhost', 'root', '')
    or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    mysqli_select_db($dbLink , 'user')
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
    if ()
    $query = 'INSERT INTO user (nom, genre, email, password, verification, telephone, pays, date) VALUES (\''
        . $nom . '\', \''
        . $genre . '\', \''
        . $email . '\', \''
        . $password . '\', \''
        . $verification . '\', \''
        . $telephone . '\', \''
        . $pays . '\', \''
        . 'NOW()' . '\')';
    if(!($dbResult = mysqli_query($dbLink, $query)))
    {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    else {
        echo $nom.', votre requête a bien été enregistrée.';
    }
}

?>
