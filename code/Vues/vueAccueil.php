<?php

echo 'Accueil';?>

<!-- Formulaire de contact-->

<h1>Contact</h1>
<form class="cf" action="#" method="post">
    <div class="moitié-gauche-cf">
        <input type="text" id="input-nom" placeholder="Prénom Nom">
        <input type="email" id="input-email" placeholder="Email">
        <input type="text" id="input-sujet" placeholder="Sujet">
    </div>
    <div class="moitié-droite-cf">
        <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
    </div>
    <input type="submit" name="action" value="Envoyer" id="input-submit">
</form>


<div id="content">
    <form id="form_image" method="post" action="vueAccueil.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea name="texte" cols="40" rows="4" placeholder="Ecrire un message"></textarea>
        </div>
        <div>
            <button type="submit" name="poster" >POSTER</button>
        </div>
    </form>
</div>

