<?php

class Header {

	private $_bdd;
	private $_data = array();

	public function __construct($bdd) {
		$this->_bdd = $bdd;

		$this->_data[0]['title'] = "Accueil";
		$this->_data[0]['url']   = "index.php?page=accueil";
		$this->_data[1]['title'] = "News";
		$this->_data[1]['url']   = "index.php?page=news";
        $this->_data[2]['title'] = "Calendrier";
        $this->_data[2]['url']   = "index.php?page=calendrier";
        $this->_data[3]['title'] = "Equipes";
        $this->_data[3]['url']   = "index.php?page=equipes";
        if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
            $this->_data[4]['title'] = $_SESSION['user']['Pseudo'];
            $this->_data[4]['url']   = "index.php?page=profil";
            $this->_data[5]['title'] = "Deconnexion";
            $this->_data[5]['url']   = "index.php?page=deconnexion";
        } else {
            $this->_data[4]['title'] = "Connexion";
            $this->_data[4]['url']   = "index.php?page=connexion";
            $this->_data[5]['title'] = "Inscription";
            $this->_data[5]['url']   = "index.php?page=inscription";
        }

	}

	public function get_content() {
		return $this->_data;
	}

}

?>