<?php
class Bdd{

    private static $_bdd;

    // INSTANCIE LA CONNEXION A LA BDD
    private static function setBdd(){

        self::$_bdd = new PDO('mysql:host=mysql-vanestarre-officielle.alwaysdata.net;dbname=vanestarre-officielle_bdd;charset=utf8','225221_php', 'Qe85q7PUy');
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

    //Equivalent de la fonction prepare permettant les prepared statement
    public function prepare($requete){
        return self::getBdd()->prepare($requete);
    }

    //Equivalent de la fonction errorInfo
	public function errorInfo(){
		return self::$_bdd->errorInfo();
	}
}
