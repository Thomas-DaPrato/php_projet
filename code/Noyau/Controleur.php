<?php

final class Controleur
{
    private $_A_urlDecortique;

    public function __construct ($S_controleur, $S_action)
    {

        if (empty($S_controleur)) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $this->_A_urlDecortique['controleur'] = 'ControleurAccueil';
        } else {
            $this->_A_urlDecortique['controleur'] = 'Controleur' . ucfirst($S_controleur); //ucfirst met la première lettre en majuscule
        }

        if (empty($S_action)) {
            // L'action est vide ! On la valorise par défaut
            $this->_A_urlDecortique['action'] = 'Afficher';
        } else {

            $this->_A_urlDecortique['action']  = $S_action;
        }

    }

    // On exécute
    public function executer()
    {
        session_start();
        //fonction de rappel de notre controleur cible (ControleurHelloworld pour notre premier exemple)
        call_user_func_array(array(new $this->_A_urlDecortique['controleur'],
            $this->_A_urlDecortique['action']), array());

    }
}