<?php

  /*
   ========================================
   Classe qui gere les differents menus
   ========================================
   */


class Header {

    private $_bdd; /* base de donnees rattache */
    private $_data = array(); /* les elements du menu */
    private $_data_connect;
    /** 
     \brief construit l'objet en chargeant les elements du menu
     \param bdd la base de donnees
    */
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
            $this->_data_connect[0]['title'] = $_SESSION['user']['Pseudo'];
            $this->_data_connect[0]['url']   = "index.php?page=profil";
            $this->_data_connect[1]['title'] = "Deconnexion";
            $this->_data_connect[1]['url']   = "index.php?page=deconnexion";

        } else {

            $this->_data_connect[0]['title'] = "Connexion";
            $this->_data_connect[0]['url']   = "index.php?page=connexion";
            $this->_data_connect[1]['title'] = "Inscription";
            $this->_data_connect[1]['url']   = "index.php?page=inscription";

        }

    }
    
    /**
     \brief renvoi les elements du menu
     \param void 
     \return tableau d'element de menu
     */
    public function get_content() {
	return $this->_data;
    }

    public function get_content_connexion() {
	return $this->_data_connect;
    }

}

?>