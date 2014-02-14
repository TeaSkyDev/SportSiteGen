<?php

class Poste {

    private $_bdd;

    public function __construct($bdd) {
	$this->_bdd = $bdd;
    }


    public function insert($nom, $desc) {
	$query = $this->_bdd->prepare("insert into POSTE values(null, :nom, :desc)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $desc);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from POSTE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function search_byId($id) {
	$query = $this->_bdd->prepare("select * from POSTE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }


    public function search_byName($name) {
	$query = $this->_bdd->prepare("select * from POSTE where Nom = :name");
	$query->bindParam(":name", $name);
	$query->execute();
	if($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }




}



?>