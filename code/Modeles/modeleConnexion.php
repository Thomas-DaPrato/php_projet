<?php

$nom = $_POST['pseudo'];
$email = '';
if (isset($_POST['email']))
    $email = $_POST['email'];
$mdp = $_POST['mdp'];
$action = $_POST['action'];
if (isset($_POST['verificationmdp'])) {
    $verificationmdp = $_POST['verificationmdp'];
}