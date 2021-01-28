<?php require 'Bdd.php';
 final class Post{
     private $bdd;
     public function __construct (){
         $this->bdd = new Bdd();

     }

     public function StockerPost($texte, $image, $tag){
         $req1 = 'INSERT INTO message (texte) VALUES (\'' . $texte . '\')';
         $reqIdMsg = 'select max(id_msg) from message';
         $this->bdd->executerReq($req1);
         $resultat = $this->bdd->executerReq($reqIdMsg);
         $post['max(id_msg)'] = null;
         while ($id_msg = $resultat->fetch(PDO::FETCH_ASSOC)) {
             $post['max(id_msg)'] = $id_msg['max(id_msg)'];
         }
         if (!($image == null)) {
             $req2 = 'INSERT INTO images VALUES (\'' . $image . '\',\''.$post['max(id_msg)'] . '\')';
             $this->bdd->executerReq($req2);
         }
         if (!($tag == null)) {
             foreach ($tag as $unTag){
                 $req3 = 'INSERT INTO tag VALUES (\'' . $unTag . '\',\''.$post['max(id_msg)'] . '\')';
                 $this->bdd->executerReq($req3);
             }

         }

}

    public function AfficherPost(){
        $bdd = new Bdd();

    }

}