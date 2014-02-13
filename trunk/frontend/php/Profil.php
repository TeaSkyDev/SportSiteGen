<?php

class Profil {

    private $_bdd;
    
    
    public function __construct($bdd) {
	$this->_bdd = $bdd;
    }

    public function exist($name) {
	$query = $this->_bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
	$query->bindParam(":name", $name);
	$query->execute();
	return $query->rowCount() == 0;
    }

    public function insert($name, $pass, $photo, $type) {
	$query = $this->_bdd->prepare("insert into UTILISATEUR values(null, :name, :pass, :photo, :type)");
	$query->bindParam(":name", $name);
	$query->bindParam(":pass", md5($pass));
	$query->bindParam(":photo", $photo);
	$query->bindParam(":type", $type);
	$query->execute();
	return $query->rowCount() == 0;
    }

    public function delete_byName($name) {
	$query = $this->_bdd->prepare("delete * from UTILISATEUR where Pseudo = :name");
	$query->bindParam(":name", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from UTILISATEUR where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function search_byName($name) {
	$query = $this->_bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
	$query->bindParam(":name", $name);
	$query->execute();
	if( $query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }


    public function search_byId($id) {
	$query = $this->_bdd->prepare("select * from UTILISATEUR where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }

    


}



?>
