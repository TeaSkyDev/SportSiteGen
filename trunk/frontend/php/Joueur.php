<?php

class Joueur {

    private $_bdd;
    private $_nb;


    public function __construct($bdd) {
	$this->_bdd = $bdd;
    }



    public function search_byId($id) {
	$query = $this->_bdd->prepare("select * from JOUEUR where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }

    public function search_byName($name) {
	$name = $name."%";
	$query = $this->_bdd->prepare("select * from JOUEUR where Nom like :name");
	$query->bindParam(":name", $name);
	$query->execute();
	if ($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }

    public function search_byTeamId($id) {
	$query = $this->_bdd->prepare("select * from JOUEUR where IdTeam = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }


    public function search_byPosteId($id) {
	$query = $this->_bdd->prepare("select * from JOUEUR where IdPoste = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }


    public function insert($team, $nom, $photo, $prenom, $poste, $desc) {
	$query = $this->_bdd->prepare("insert into JOUEUR values(null, :team, :nom, :photo, :prenom, :poste, :desc)");
	$query->bindParam(":team", $team);
	$query->bindParam(":nom", $nom);
	$query->bindParam(":photo", $photo);
	$query->bindParam(":prenom", $prenom);
	$query->bindParam(":poste", $poste);
	$query->bindParam(":desc", $desc);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from JOUEUR where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    


}




?>