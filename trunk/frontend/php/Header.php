<?php

class Header {

    private $_bdd;
    private $_data = array();

    public function __construct($bdd) {
	$this->_bdd = $bdd;
	//cherche tout les Menu Elem
	$query = $this->_bdd->prepare("select * from MENU_ELEM");
	$query->execute();
	$i = 0;
	if($query->rowCount() > 0) {
	    while ($data = $query->fetch()) {
		$this->_data[$i]['title'] = $data['Nom'];
		$this->_data[$i]['url']   = $data['url'];
		$i++;
	    }
	} 
        if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
            $this->_data[$i]['title'] = $_SESSION['user']['Pseudo'];
            $this->_data[$i]['url']   = "index.php?page=profil";
            $this->_data[$i+1]['title'] = "Deconnexion";
            $this->_data[$i+1]['url']   = "index.php?page=deconnexion";

        } else {

            $this->_data[$i]['title'] = "Connexion";
            $this->_data[$i]['url']   = "index.php?page=connexion";
            $this->_data[$i+1]['title'] = "Inscription";
            $this->_data[$i+1]['url']   = "index.php?page=inscription";

        }

    }

	public function get_content() {
		return $this->_data;
	}

}

?>