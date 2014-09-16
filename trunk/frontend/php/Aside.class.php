<?php


  /*============================================================
   Classe Permettant d'obtnenir les Info sur le cote de la page
   =============================================================
   */


class Aside {

    private $_smarty;
    private $_bdd;
    private $_data_news; /* contient les news de la base */
    private $_data_calendrier; /* contient les evenement de la base */ 
    private $_nb_news; /* le nombre de news dans la variable _data_news */
    private $_nb_calendrier; /* le nombre d'evenements dans la variable _data_calendrier */

    
    /**
     \brief construit l'objet
     \param bdd la base de donnees a laquelle sera rattache l'objet
     \param smarty représente l'objet smarty (moteur de template)
     \param template représente le template à utiliser
     */
    public function __construct($bdd, $smarty, $template) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
    }


    public function get_content() {
        get_content_news();
        get_content_calendrier();
        return $this->_smarty->fetch("templates/".$this->_template."/html/aside.html");
    }

    /**
     \brief cree un tableau des 10 dernieres news 
     \param void
     \returntableau des 10 dernieres news ( ! peut etre vide )
     */
    private function get_content_news() {
        $news = new News($this->_bdd, $this->_template);
        $this->_data_news = $news->get_content();

        $i = 0;
        $data = array();
        while(isset($this->_data_news[$i]) && $i < 10) {
            $data[$i] = $this->_data_news[$i];
            $i++;
        }

        $this->_smarty->assign("AsideNews", $data);
    }


    /**
     \brief cree un tableau des 10 dernier evenement 
     \param void
     \returntableau des 10 derniers evenement ( ! peut etre vide )
     */
    private function get_content_calendrier() {
        $cal = new Calendrier($this->_bdd, $this->_template);
        $this->_data_calendrier = $cal->get_content();

        $i = 0;
        $data = array();
        while( isset($this->_data_calendrier[$i] ) && $i < 10 ) {
            $data[$i] = $this->_data_calendrier[$i];
            $i++;
        }

        $this->_smarty->assign("AsideCal", $data);
    }
}




?>