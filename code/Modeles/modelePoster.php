<?php
 final class Post{

     private function StockerPost($texte, $image){
         $bdd = new Bdd();
         $req1 = 'INSERT INTO message (text) VALUES (\'' . $texte . '\')';
         $req2 = 'INSERT INTO images (image) VALUES (\'' . $image . '\')';
         $bdd->executerReq($req1);
         $bdd->executerReq($req2);
}

    public function AfficherPost(){
        $bdd = new Bdd();


    }

}