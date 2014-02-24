<?php

  /*
   ========================================================
   Classe qui gere le chargement des Element de Menu
   ========================================================
   */


class MenuElem {

    private $_bdd; /* la base de donnees rattache */
    private $_data; /* les donnees charge des elements de menu */
    private $_nb; /* le nombre d'element */

    /**
     \brief construit l'objet
     \param bdd la base de donnees
     */
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


    /**
     \brief insere une element dans la base
     \param name le nom de l'element 
     \param url l'url de l'element 
     \return vrai si l'insertion a reussi faux sinon
     */
    public function insert($name, $url) {
	$query = $this->_bdd->prepare("insert into MENU_ELEM value(null, :nom, :url)");
	$query->bindParam(":nom", $name);
	$query->bindParam(":url", $url);
	$query->execute();
	return $query->rownCount() == 1;
    }


    /**
     \brief supprime un element en fonction de son nom
     \param name le nom de l'element
     \return vrai si reussi faux sinon
     */
    public function delete_byName($name) {
	$query = $this->_bbd->prepare("delete * from MENU_ELEM where Nom = :nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }


    /**
     \brief supprime un element en fonction de son id
     \param id l'identifiant de l'element
     \return vrai si reussi faux sinon
     */
    public function delete_byId($id) {
	$query = $this->prepare("delete * from MENU_ELEM where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief cherche un element en fonction de son nom
     \param name le nom de l'element
     \return un element ou false
     */
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

    /**
     \brief cherche un element en fonction de son id
     \param id l'identifiant de l'element
     \return un element ou false
     */
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