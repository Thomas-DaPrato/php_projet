<?php
final class Msg {
    private $bdd;
    public function __construct ()
    {
        $this->bdd = new Bdd();
    }

    public function afficheMsg()
    {
        $querryMsg = 'select id_msg,texte from message';
        $this->bdd->executerReq($querryMsg);
        while ()
    }
}