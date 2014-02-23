<?php

class Site {

    private $_bdd;
    private $_data;
    private $_nb;


    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$query = $bdd->prepare("select * from SITE");
	$query->execute();
	$this->_nb = 0;
	if ( $query->rowCount() != 0 ) {
	    $this->_data = $query->fetch();
	}
    }


    public function get_content() {
	return $this->_data;
    }
    


    public function change_URL($url) {
	$query = $this->_bdd->prepare("update SITE set URL=:url");
	$query->bindParam(":url", $url);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public static function s_change_URL($bdd, $url) {
	$query = $bdd->prepare("update SITE set URL=:url");
	$query->bindParam(":url", $url);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function change_Name($name) {
	$query = $this->_bdd->prepare("update SITE set Nom=:nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }

    public static function s_change_Name($bdd, $name) {
	$query = $bdd->prepare("update SITE set Nom=:nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function change_Template($template) {
	$query = $this->_bdd->prepare("update SITE set current_template=:template");
	$query->bindParam(":template", $template);
	$query->execute();
	return $query->rowCount() != 0;
    }

    public static function s_change_Template($bdd, $template) {
	$query = $bdd->prepare("update SITE set current_template=:template");
	$query->bindParam(":template", $template);
	$query->execute();
	return $query->rowCount() != 0;
    }





}





?>