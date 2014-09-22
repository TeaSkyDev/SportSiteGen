<?php

/**
 * Classe gérant le contenu à afficher en fonction de la page demandée
 */

class Content {

    private $_bdd;
    private $_smarty;
    private $_page;

    public function __construct($bdd, $smarty, $page) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
        $this->_page   = $page;
    }

    public function get_content() {

        $content = "";

        switch($this->_page) {
            case "home":
                $content = $this->get_home();
                break;
            case "logout":
                $content = $this->get_deconnexion();
                break;
            default:
                $content = $this->get_home();
        }

        return $this->_smarty->fetch("html/home.html");
    }

    private function get_home() {
        //$home = new Home($this->_bdd, $this->_smarty);
        //return $home->get_content();
    }

    private function get_deconnexion() {
        $_SESSION['admin_connected'] = false;
        unset($_SESSION['admin']);
        header("Location: index.php");
    }

}

?>