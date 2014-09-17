<?php

/*
 ====================================================================
 Classe qui gere les News dans la base de donnees et le commentaires
 ====================================================================
 */

class News {

    private $_smarty; /* moteur de template */
    private $_bdd; /* la base de donnees */

    /**
    \brief construit l'objet
    \param bdd la base de donnees
     */
    public function __construct($bdd, $smarty) {
        $this->_bdd = $bdd;
        $this->_smarty = $smarty;
    }

    /**
     * \brief retourne la page news (toutes les news)
     */
    public function get_contenu() {
        $this->get_all_news();
        return $this->_smarty->fetch(TEMPLATE."/html/news.html");
    }

    /**
    \brief charge toute le news de la base
    \param void
     */
    private function get_all_news() {
        $query = $this->_bdd->prepare("select * from NEWS ORDER BY Id desc");
        $query->execute();

        if($query->rowCount() != 0) {
            $data = array(); //va contenir les news
            $i = 0;
            while($d = $query->fetch()) {
                $photo = Photo::s_search_byId($this->_bdd, $d['IdPhoto']);
                $data[$i] = $d;
                $data[$i]['img'] = $photo['Fichier'];
                $i++;
            }
        }
        $this->_smarty->assign("News", $data);
        $this->_smarty->assign("NSimple", 0);
    }

    public function get_data_news() {
        $query = $this->_bdd->prepare("select * from NEWS ORDER BY Id desc");
        $query->execute();

        if($query->rowCount() != 0) {
            $data = array(); //va contenir les news
            $i = 0;
            while($d = $query->fetch()) {
                $photo = Photo::s_search_byId($this->_bdd, $d['IdPhoto']);
                $data[$i] = $d;
                $data[$i]['img'] = $photo['Fichier'];
                $i++;
            }
        }
        return $data;
    }

}


?>
