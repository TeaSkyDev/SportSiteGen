<?php

class Accueil {

    private $bdd;
    private $smarty;

    public function __construct($bdd, $smarty) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
    }

    public function get_contenu() {
        //$this->get_news();
        //$this->get_events();
        return $this->_smarty->fetch(TEMPLATE."/html/home.html");
    }

    private function get_news() {


    }

}

?>