<?php


class MenuElem {

    private $_bdd;
    private $_data;
    private $_nb;


    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$query = $bdd->prepare("select * from MENU_ELEM");
	$query->execute();
	$this->_nb = 0;
	if ( $query->rowCount() != 0 ) {
	    while ( $rep = $query->fetch() ) {
		$this->_data[$this->_nb] = $rep;
		$this->_nb++;
	    }
	}
    }


    public function insert($name, $url) {
	$query = $this->_bdd->prepare("insert into MENU_ELEM value(null, :nom, :url)");
	$query->bindParam(":nom", $name);
	$query->bindParam(":url", $url);
	$query->execute();
	return $query->rownCount() == 1;
    }



    public function delete_byName($name) {
	$query = $this->_bbd->prepare("delete * from MENU_ELEM where Nom = ;nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function delete_byId($id) {
	$query = $this->prepare("delete * from MENU_ELEM where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function search_byName($name) {
	$query = $this->_bdd->prepapre("select * from MENU_ELEM where Nom=:nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	if ( $query->rowCount() != 0 ) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }

    public function search_byId($id) {
	$query = $this->_bdd->prepare("select * from MENU_ELEM where Id=:id");
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