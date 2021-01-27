<?php
final class Emoji
{
    private $bdd;
    private $querry = 'update message set ';

    public function __construct (){
        $this->bdd = new Bdd();

    }
    public function addLove($id_msg)
    {
        $this->querry .= 'nb_love = nb_love+1 where id_msg='.$id_msg;
        $this->bdd->executerReq($this->querry);
    }

    public function addCute($id_msg) {
        $this->querry .= 'nb_cute = nb_cute+1 where id_msg='.$id_msg;
        $this->bdd->executerReq($this->querry);
    }

    public function addTrop_style($id_msg) {
        $this->querry .= 'nb_trop_style = nb_trop_style+1 where id_msg='.$id_msg;
        $this->bdd->executerReq($this->querry);
    }

    public function addSwag($id_msg) {
        $this->querry .= 'nb_swag = nb_swag+1 where id_msg='.$id_msg;
        $this->bdd->executerReq($this->querry);
    }
}