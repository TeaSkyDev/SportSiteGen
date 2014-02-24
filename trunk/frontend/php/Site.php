<?php

  /*
   ======================================================
   Classe gerant les informations du site
   ======================================================
   */


class Site {

    private $_bdd; /* la base de donnees */
    private $_data; /* les info sur le site */
    private $_nb; /* le nombre d'info */

    /**
     \brief construit l'objet
     \param bdd la base de donnee
    */
    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$query = $bdd->prepare("select * from SITE");
	$query->execute();
	$this->_nb = 0;
	if ( $query->rowCount() != 0 ) {
	    $this->_data = $query->fetch();
	}
    }

    /**
     \brief renvoi les info sur le site
     \param void
     \return les infos du site
     */
    public function get_content() {
	return $this->_data;
    }
    

    /**
     \brief permet de changer l'url du site
     \param url le nouvel url
     \return vrai si reussi faux sinon
     */
    public function change_URL($url) {
	$query = $this->_bdd->prepare("update SITE set URL=:url");
	$query->bindParam(":url", $url);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief permet de changer l'url du site ( fonction statique )
     \param bdd la base de donnees
     \param url le nouvel url
     \return vrai si reussi faux sinon
     */
    public static function s_change_URL($bdd, $url) {
	$query = $bdd->prepare("update SITE set URL=:url");
	$query->bindParam(":url", $url);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief permet de changer le nom du site
     \param name le nouveau nom du site
     \return vrai si reussi faux sinon
     */
    public function change_Name($name) {
	$query = $this->_bdd->prepare("update SITE set Nom=:nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief permet de changer le nom du site ( fonction statique )
     \param bdd la base de donnees
     \param name le nouveau nom du site
     \return vrai si reussi faux sinon
     */
    public static function s_change_Name($bdd, $name) {
	$query = $bdd->prepare("update SITE set Nom=:nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }

    
    /**
     \brief permet de changer le template
     \param template le nouveau template
     \return vrai si reussi faux sinon
     */
    public function change_Template($template) {
	$query = $this->_bdd->prepare("update SITE set current_template=:template");
	$query->bindParam(":template", $template);
	$query->execute();
	return $query->rowCount() != 0;
    }

    /**
     \brief permet de changer le template ( fonction statique )
     \param bdd la base de donnees
     \param template le nouveau template
     \return vrai si reussi faux sinon
     */
    public static function s_change_Template($bdd, $template) {
	$query = $bdd->prepare("update SITE set current_template=:template");
	$query->bindParam(":template", $template);
	$query->execute();
	return $query->rowCount() != 0;
    }





}





?>