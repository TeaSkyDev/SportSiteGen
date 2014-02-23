<?php


class Categorie {

    private $_bdd;
    private $_data;
    private $_nb;

    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$query = $bdd->prepare("select * from CATEGORIE");
	$query->execute();
	$this->_nb = 0;
	if ( $query->rowCount() != 0 ) {
	    while ( $rep = $query->fetch() ) {
		$this->_data[$this->_nb] = $rep;
		$this->_nb++;
	    }
	}
    }



    public function get_content() {
	return $this->_data;
    }





}
		




?>