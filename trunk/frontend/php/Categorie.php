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



    public function insert($nom, $description) {
	$query = $this->_bdd->prepare("insert into CATEGORIE values(null, :nom, :desc)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $description);
	$query->execute();
	return $query->rowCount() == 1;
    }

    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from CATEGORIE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function delete_byName($name) {
	$query = $this->_bdd->prepare("delete * from CATEGORIE where Nom = :nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function search_byName($name) {
	$query = $this->_bdd->prepare("select * from CATEGORIE where Nom = :nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	if ( $query->rowCount() != 0 ) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }


    public function search_byId($id) {
    	$query = $this->_bdd->prepare("select * from CATEGORIE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ( $query->rowCount() != 0 ) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }







}
		




?>