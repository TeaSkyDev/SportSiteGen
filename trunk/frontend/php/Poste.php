<?php


  /*
   =============================================================
   Classe gere les postes des Joueurs 
   =============================================================
   */


class Poste {

    private $_bdd; /*la base de donnees */

    
    public function __construct($bdd) {
	$this->_bdd = $bdd;
    }

    /**
     \brief insere un nouveau poste dans la base de donnees
     \param nom le nom du poste 
     \param desc la description du poste
     \return vrai si reussi faux sinon
     */
    public function insert($nom, $desc) {
	$query = $this->_bdd->prepare("insert into POSTE values(null, :nom, :desc)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $desc);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief supprime un poste en fonction de son id
     \param id l'identifiant du poste
     \return vrai si reussi faux sinon
     */
    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from POSTE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    
    /**
     \brief cherche un poste en fonction de son id
     \param id l'identifiant du poste
     \return un poste ou false
     */
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

    /**
     \brief cherche un poste en fonction de son nom
     \param name le nom du poste
     \return un poste ou false
     */
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