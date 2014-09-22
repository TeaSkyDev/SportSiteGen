<?php

/**
 * Classe gérant le contenu à afficher en fonction de la page demandée
 */

class Content {

    private $_bdd;    //connexion à la base de données
    private $_smarty; //moteur de template
    private $_page;   //page demandée

    /**
     * @brief Constructeur de la classe content
     *
     * @param $bdd connexion à la base de données
     * @param $smarty moteur de template
     * @param $page la page demandée
     */
    public function __construct($bdd, $smarty, $page) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
        $this->_page   = $page;
    }

    /**
     * @brief renvoie le code html à afficher suivant la page demandée
     * @return string
     */
    public function get_content() {

        $content = "";

        //suivant la fonctionnalité demandée, on appel la méthode correspondantes
        switch($this->_page) {
            case "home":
                $content = $this->get_home();
                break;
            case "logout":
                $content = $this->get_deconnexion();
                break;
            case "news":
                $content = $this->get_news();
                break;
            default:
                $content = $this->get_home();
        }

        return $content;
    }

    /**
     * @brief renvoie le code relatif à la page d'accueil
     */
    private function get_home() {
        //$home = new Home($this->_bdd, $this->_smarty);
        //return $home->get_content();
    }

    /**
     * @brief Déconnecte l'administrateur et renvoie sur la page de connexion
     */
    private function get_deconnexion() {
        $_SESSION['admin_connected'] = false;
        unset($_SESSION['admin']);
        header("Location: index.php");
    }

    /**
     * @brief renvoie le code relatif à la page News
     * @return string
     */
    private function get_news() {
        $news = new News($this->_bdd, $this->_smarty);
        return $news->get_content();
    }

}

?>