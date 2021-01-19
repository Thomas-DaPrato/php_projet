<?php
class Bdd{

    private static $_bdd;

    // INSTANCIE LA CONNEXION A LA BDD
    private static function setBdd(){

        self::$_bdd = new PDO('mysql:host=localhost;dbname=projet_web_bd;charset=utf8','root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // RECUPERE LA CONNEXION A LA BDD
    public function getBdd(){

        if(self::$_bdd == null)
            self::setBdd(); // on créer la connexion si elle n'existe pas
        return self::$_bdd;
    }

    // EXECUTE UNE REQUETE SQL
    public function executerReq($sql, $params = null){
        if ($params == null){
            $resultat = self::getBdd()->query($sql); // exécution directe
        }
        else {
            $resultat = self::getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
	
	public function errorInfo(){
		return self::$_bdd->errorInfo();
	}
}
