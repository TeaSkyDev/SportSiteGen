<?php


  /*============================================================
   Classe Permettant d'obtnenir les Info sur le cote de la page
   =============================================================
   */


class Aside {

    private $_data_news; /* contient les news de la base */
    private $_data_calendrier; /* contient les evenement de la base */ 
    private $_nb_news; /* le nombre de news dans la variable _data_news */
    private $_nb_calendrier; /* le nombre d'evenements dans la variable _data_calendrier */

    
    /**
     \brief construit l'objet
     \param bdd la base de donnees a laquelle sera rattache l'objet
     */
    public function __construct($bdd) {
	$news = new News($bdd);
	$cal = new Calendrier($bdd);
	$this->_data_news = $news->get_content();
	$this->_data_calendrier = $cal->get_content();
    }


    /**
     \brief cree un tableau des 10 dernieres news 
     \param void
     \returntableau des 10 dernieres news ( ! peut etre vide )
     */
    public function get_content_news() {
	$i = 0;
	$data = array();
	while(isset($this->_data_news[$i]) && $i < 10) {
	    $data[$i] = $this->_data_news[$i];
	    $i++;
	}
	return $data;
    }


    /**
     \brief cree un tableau des 10 dernier evenement 
     \param void
     \returntableau des 10 derniers evenement ( ! peut etre vide )
     */
    public function get_content_calendrier() {
	$i = 0; 
	$data = array();
	while( isset($this->_data_calendrier[$i] ) && $i < 10 ) {
	    $data[$i] = $this->_data_calendrier[$i];
	    $i++;
	} 
	return $data;
    }

    



}




?>