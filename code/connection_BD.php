<?php
function connection ($hostname, $username, $pwd)
{
    if(!($dbLink = mysqli_connect($hostname,$username,$pwd)))
        die('Erreur de connexion au serveur : '.mysqli_connect_error());
    return $dbLink;
}
?>
