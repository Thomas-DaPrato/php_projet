<!--<script src="../Scripts/telechargerImage.js"></script>-->

<!-- Poster une image -->

<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VANESTARRE</title>
    <link rel="stylesheet"  type="text/css" href="../Contenu/CSS/style.css" > <!-- Importation du CSS -->
    <link rel="shortcut icon" type="image/png" href="../Contenu/Images/favicon.png"/> <!-- Favicon -->
</head>
<body>
<div id="content">
    <?php
    // connexion à la base de donnée
    $db = mysqli_connect('localhost','root','','projet_web_bd');
    $sql = 'SELECT * FROM images';
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<div id='img_div'>";
            echo "<img src='../Contenu/Bdd_Images/".$row['image']."' >";
            echo "<p>".$row['text_img']."</p>";
        echo "</div>";
    }

    ?>
    <form id="form_image" method="post" action="vueAdmin.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea name="text_img" cols="40" rows="4" placeholder="Ecrire un message"></textarea>
        </div>
        <div>
            <button type="submit" name="poster" >POSTER</button>
        </div>
    </form>
</div>
</body>
</html>

<?php

    $msg = '';
    // si le bouton est pressé
    if (isset($_POST['poster'])){
        // le chemin pour stocker l'image téléchargée
        $cible = '../Contenu/Bdd_Images/' .basename($_FILES['image']['name']);

        // connexion à la base de donnée
        $db = mysqli_connect('localhost','root','','projet_web_bd');

        // obtenir toutes les données soumises à partir du formulaire
        $image = $_FILES['image']['name']; //récupérer le nom de l'image
        $text_img = $_POST['text_img']; //récupérer le texte de l'image

        $sql = 'INSERT INTO images (image, text_img) VALUES (\'' . $image . '\', \'' . $text_img . '\')';
        mysqli_query($db, $sql); // stocke les données soumises dans la table de base de données: images

        // déplacer l'image téléchargée dans le dossier: Bdd_images
        if (move_uploaded_file($_FILES['image']['tmp_name'], $cible)){
            $msg = 'L\'image a bien été téléchargée';
        }else{
            $smg = 'Erreur : L\'image n\' pas pu être téléchargée';
        }
        echo $msg;

    }

?>






