<?php

final class ControleurAccueil
{
    public function Afficher()
    {
        Vue::montrer('vueAccueil', array());
    }

}