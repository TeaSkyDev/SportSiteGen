<?php
  /*
   ==================================================
   Classe qui gere les categories dans la base
   ==================================================
   */

require("php/Equipe.php");


class Categorie {

    private $_bdd; /* base rattache a la classe */
    private $_data; /* les differentes categorie charger depuis la base */
    private $_nb; /* le nombre de categorie charger dans la base */

    
    /**
     \brief construit l'objet
     \param bdd la base a laquelle l'objet sera rattache
     */
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


    /**
     \brief renvoi les donne charge
     \param void
     \return renvoi les donnes sous forme de tableau
     */
    public function get_content() {
	return $this->_data;
    }


    /**
     \brief ajoute une nouvelle categorie a la base
     \param nom le nom de la categorie
     \param description la description de la categorie
     \return vrai si l'ajout a reussi faux sinon
     */
    public function insert($nom, $description) {
	$query = $this->_bdd->prepare("insert into CATEGORIE values(null, :nom, :desc)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $description);
	$query->execute();
	return $query->rowCount() == 1;
    }

    


    /**
     \brief supprime une categorie de la base en fonction de son id
     \param id l'identifiant de la categorie
     \return vrai si la suppression a reussi faux sinon
     */
    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from CATEGORIE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief supprime une categorie de la base en fonction de son id ( fonction statique )
     \param bdd la base de donne dans laquelle supprimer
     \param id l'identifiant de la categorie
     \return vrai si la suppression a reussi faux sinon
    */
    public static function s_delete_byId($bdd, $id) {
	$query = $bdd->prepare("delete from CATEGORIE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	Equipe::s_delete_byCatId($bdd, $id);
	return $query->rowCount() == 1;
    }

    
    /**
     \brief supprime une categorie en fonction du nom 
     \param name le nom de la categorie
     \return vrai si la suppression a reussi faux sinon
    */
    public function delete_byName($name) {
	$query = $this->_bdd->prepare("delete from CATEGORIE where Nom = :nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief supprime une categorie en fonction du nom ( fonction statique )
     \param bdd la base dans laquelle supprimer 
     \param name le nom de la categorie
     \return vrai si la suppression a reussi faux sinon
     */
    public static function s_delete_byName($bdd, $name) {
	$query = $bdd->prepare("delete * from CATEGORIE where Nom = :nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief cherche une categorie en fonction de son nom
     \param name le nom de la categorie
     \return la categorie ou faux
     */
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

    /**
     \brief cherche une categorie en focntion de son nom ( fonction statique )
     \param bdd la base dans laquelle chercher
     \param name le nom de la categorie
     \return renvoi le categorie ou faux
     */
    public static function s_search_byName($bdd, $name) {
	$query = $bdd->prepare("select * from CATEGORIE where Nom = :nom");
	$query->bindParam(":nom", $name);
	$query->execute();
	if ( $query->rowCount() != 0 ) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }

    
    /**
     \brief cherche une categorie en focntion de son id
     \param id l'identifiant de la categorie
     \return renvoi la categorie ou faux
     */
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

    /**
     \brief cherche une categorie en fonction de son id ( fonction statique )
     \param bdd la base dans laquelle chercher 
     \param id l'identifiant de la categorie
     \return la categorie ou faux
     */
    public static function s_search_byId($bdd, $id) {
    	$query = $bdd->prepare("select * from CATEGORIE where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ( $query->rowCount() != 0 ) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }

    /**
     \brief ajoute une nouvelle categorie a la base ( fonction statique )
     \param bdd la base de donne dans laquelle inserer
     \param nom le nom de la categorie 
     \param description la description de la categorie
     \return vrai si l'ajout a reussi faux sinon
     */
    public static function s_insert($bdd, $nom, $description) {
	$query = $bdd->prepare("insert into CATEGORIE values(null, :nom, :desc)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $description);
	$query->execute();
	return $query->rowCount() == 1;
    }


    /**
       \brief met a jour une categorie 
       \param bdd la base de donnees
       \param id l'identifiant de la categorie
       \param nom le nom de la categorie
       \param description la description de la categorie
     */
    static public function s_update($bdd, $id, $nom, $description) {
	$query = $bdd->prepare("UPDATE CATEGORIE SET Nom=:nom, Description=:desc where Id = :id");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $description);
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() != 0;
    }





}
		




?>