<?php

//require_once("php/Home.class.php");
//require_once("php/News.class.php");
//require_once("php/Calendar.class.php");
/*require_once("Equipe.class.php");
require_once("Joueur.class.php");
require_once("Profil.class.php");
require_once("Connexion.class.php");
require_once("Inscription.class.php");
require_once("Match.class.php");
require_once("Tournoi.class.php");
require_once("Photo.class.php");*/


/*
  ==============================================
  Classe qui gere le parsing de toute les pages
  ==============================================
*/


class Content {

    private $_bdd; /* base de donnees rattache */
    private $_smarty; /* systeme de parsing */
    private $_page; /* page demandée */

    /**
     * @brief construit l'objet
     * @param bdd la base de donne
     * @param template le nom du template a parse
     * @param smarty le systeme de parsing
    */
    public function __construct($bdd, $smarty, $page) {
        $this->_bdd      = $bdd;
        $this->_smarty   = $smarty;
        $this->_page     = $page;
    }

    /**
     * @brief suivant la page demandée, on appel la fonction correspondante
     * @return string : code html du contenu à afficher
     */
    public function get_content() {
        $content = "";
        switch($this->_page) {
            case "home":
                $content = $this->get_home();
                break;
            case "news":
                $content = $this->get_news();
                break;
            case "calendar":
                $content = $this->get_calendar();
                break;
            default:
                $content = $this->get_home();
        }

        return $content;
    }

    private function get_home() {
       /* $home = new Home($this->_bdd, $this->_smarty);
        return $home->get_content();*/
        $news = new News($this->_bdd, $this->_smarty);
        return $news->get_contenu();
    }

    private function get_news() {
        $news = new News($this->_bdd, $this->_smarty);
        return $news->get_contenu();
    }

    private function get_calendar() {
        $calendar = new Calendar($this->_bdd, $this->_smarty);
        return $calendar->get_content();
    }
}

?>