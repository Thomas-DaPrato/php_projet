<?php require 'Bdd.php';
 final class Post{
     private $bdd;
     public function __construct (){
         $this->bdd = new Bdd();

     }

     public function StockerPost($texte, $image){
         $req1 = 'INSERT INTO message (texte) VALUES (\'' . $texte . '\')';
         $reqIdMsg = 'select max(id_msg) from message';
         $this->bdd->executerReq($req1);
         $resultat = $this->bdd->executerReq($reqIdMsg);
         if (!($image == null)) {
             $req2 = 'INSERT INTO images VALUES (\'' . $image . '\',\'';
             while ($post = $resultat->fetch(PDO::FETCH_ASSOC)) {
                 $req2 .= $post['max(id_msg)'] . '\')';
             }
             $this->bdd->executerReq($req2);
         }

}

    public function AfficherPost(){
        $bdd = new Bdd();


    }

}