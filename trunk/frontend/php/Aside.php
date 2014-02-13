<?php

class Aside {
    private $_data_news;
    private $_data_calendrier;
    private $_nb_news;
    private $_nb_calendrier;

    
    public function __construct($bdd) {
	$news = new News($bdd);
	$cal = new Calendrier($bdd);
	$this->_data_news = $news->get_content();
	$this->_data_calendrier = $cal->get_content();
    }


    public function get_content_news() {
	$i = 0;
	$data = array();
	while(isset($this->_data_news[$i]) && $i < 10) {
	    $data[$i] = $this->_data_news[$i];
	    $i++;
	}
	return $data;
    }

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