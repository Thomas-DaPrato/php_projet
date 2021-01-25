<?php

final class ControleurAccueil
{
    public function AfficherAccueil()
    {
        Vue::montrer('vueAccueil', array());
    }

    public function AfficherPDC()
    {
        Vue::montrer('vuePDC', array());
    }

    public function AfficherCG()
    {
        Vue::montrer('vueCG', array());
    }


}