<form id="form_image" method="post" action="index.php?c=Accueil&a=Poster" enctype="multipart/form-data">
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
