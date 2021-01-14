<?php
$link = mysqli_connect('localhost','root','','projet_web_bd');
$tag = $_POST['rechercher_tag'];
$querry = 'SELECT id_msg from tag where \'' . $tag . '\'';
?>
