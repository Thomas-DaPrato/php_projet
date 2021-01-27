<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>VANESTARRE</title>
        <link rel="stylesheet"  type="text/css" href="Contenu/CSS/style.css" > <!-- Importation du CSS -->
        <link rel="shortcut icon" type="image/png" href="Contenu/Images/favicon.png"/> <!-- Favicon -->
    </head>
    <body>
        <?php Vue::montrer('standard/entete'); ?>
        <?php echo $A_vue['body'] ?>
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>