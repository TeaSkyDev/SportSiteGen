<?php

/*
  Charge un fichier XML decrivant une fiche de match
 */
class Fiche {

    private $_data;
    private $_file;
    private $_all_file;
    
    public function __construct($file) {
	$this->_file = $file;
	$this->_all_file = simplexml_load_file($file);
    }

    public function get_content() {
	
    }



}




?>