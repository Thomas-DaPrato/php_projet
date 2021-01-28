<?php
final class Emoji
{
    private $bdd;
    private $querry = 'INSERT INTO reaction VALUES (\'';

    public function __construct (){
        $this->bdd = new Bdd();
        $this->querry .= $_SESSION['pseudo'] .'\',';
    }
    public function addLove($id_msg)
    {
        $this->querry .= '\''.$id_msg.'\',\'love\')';
        $this->bdd->executerReq($this->querry);
    }

    public function addCute($id_msg) {
        $this->querry .= '\''.$id_msg.'\',\'cute\')';
        $this->bdd->executerReq($this->querry);
    }

    public function addTrop_style($id_msg) {
        $this->querry .= '\''.$id_msg.'\',\'trop_style\')';
        $this->bdd->executerReq($this->querry);
    }

    public function addSwag($id_msg) {
        $this->querry .= '\''.$id_msg.'\',\'swag\')';
        $this->bdd->executerReq($this->querry);
    }
}