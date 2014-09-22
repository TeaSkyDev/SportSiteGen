<?php

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
            case "connexion":
                $content = $this->get_connexion();
                break;
            case "deconnexion":
                $content = $this->get_deconnexion();
                break;
            case "matchs":
                $content = $this->get_matchs();
                break;
            default:
                $content = $this->get_home();
        }

        return $content;
    }

    /**
     * @brief Va chercher le contenu à afficher à l'accueil
     * @return string : code à afficher
     */
    private function get_home() {
        $home = new Home($this->_bdd, $this->_smarty);
        return $home->get_content();
    }

    /**
     * @brief Va chercher le contenu à afficher page news
     * @return string : code à afficher
     */
    private function get_news() {
        $news = new News($this->_bdd, $this->_smarty);
        return $news->get_content();
    }

    /**
     * @brief Va chercher le contenu à afficher page calendrier
     * @return string : code à afficher
     */
    private function get_calendar() {
        $calendar = new Calendar($this->_bdd, $this->_smarty);
        return $calendar->get_content();
    }

    /**
     * @brief Va chercher le contenu à afficher page connexion
     * @return string : code à afficher
     */
    private function get_connexion() {
        $connexion = new Connexion($this->_bdd, $this->_smarty);
        return $connexion->get_contenu();
    }

    /**
     * @brief Supprime la session en cours et redirige vers l'accueil
     * @return string : code à afficher
     */
    private function get_deconnexion() {
        $_SESSION['user_connected'] = false;
        unset($_SESSION['user']);
        header("Location: index.php");
    }

    /**
     * @brief Va chercher le contenu de la page de matchs
     * @return string
     */
    private function get_matchs() {
        $matchs = new Match($this->_bdd, $this->_smarty);
        return $matchs->get_content();
    }
}

?>