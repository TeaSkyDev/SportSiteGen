<?php

/**
 * Class Home permet de récupérer la page à afficher à l'accueil
 */

class Home {

    private $_bdd;    //connexion à la base de données
    private $_smarty; //moteur de template smarty

    /**
     * @brief constructeur de l'objet
     * @param $bdd connexion
     * @param $smarty moteur de template
     */
    public function __construct($bdd, $smarty) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
    }

    /**
     * @brief Renvoie le code à afficher correspondant à l'accueil
     * @return mixed
     */
    public function get_content() {
        $this->get_news();
        $this->get_events();
        return $this->_smarty->fetch(TEMPLATE."/html/home.html");
    }

    /**
     * @brief va chercher les 10 dernières news
     */
    private function get_news() {
        $news = new News($this->_bdd, $this->_smarty);
        $data_news = $news->get_data_news();

        $res_news = array();
        $i = $j = 0;
        while(isset($data_news[$i]) && $i < 10) {
            $res_news[$j++] = $data_news[$i++];
        }

        $this->_smarty->assign("News", $res_news);
    }

    /**
     * @brief va chercher les 10 derniers evenements
     */
    private function get_events() {
        $events = new Calendar($this->_bdd, $this->_smarty);
        $data_events = $events->get_data_events();

        $res_events = array();
        $i = $j = 0;
        while(isset($data_events[$i]) && $i < 10) {
            $res_events[$j++] = $data_events[$i++];
        }

        $this->_smarty->assign("Events", $res_events);
    }

}

?>