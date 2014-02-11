<?php

class Header {

	private $_bdd;
	private $_data = array();
	private $_title;

	public function __construct($bdd) {
		$this->_bdd = $bdd;

		$this->_data[0]['title'] = "Accueil";
		$this->_data[0]['url']   = "index.php?page=accueil";
		$this->_data[1]['title'] = "News";
		$this->_data[1]['url']   = "index.php?page=news";

		$this->_title = "Debug title";
	}

	public function get_content() {
		return $this->_data;
	}

	public function get_title() {
		return $this->_title;
	}

}

?>