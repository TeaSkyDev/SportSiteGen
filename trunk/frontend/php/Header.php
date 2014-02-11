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
        $this->_data[2]['title'] = "Calendrier";
        $this->_data[2]['url']   = "index.php?page=calendrier";
        if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
            $this->_data[3]['title'] = $_SESSION['pseudo'];
            $this->_data[3]['url']   = "index.php?page=profil";
            $this->_data[4]['title'] = "Deconnexion";
            $this->_data[4]['url']   = "index.php?page=deconnexion";
        } else {
            $this->_data[3]['title'] = "Connexion";
            $this->_data[3]['url']   = "index.php?page=connexion";
            $this->_data[4]['title'] = "Inscription";
            $this->_data[4]['url']   = "index.php?page=inscription";
        }

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