<?php

  /*
   ==================================================================
   Classe qui gere toute les operations sur les joueurs dans la base
   ==================================================================
   */


class Joueur {

    private $_bdd; /* base de donnees rattache */
    private $_nb; /* le nombre de joueur dans la base */


    /**
     \brief construit l'objet
     \param la base de donnees
     */
    public function __construct($bdd) {
	$this->_bdd = $bdd;
    }


    /**
     \brief cherche un joueur en fonction de son Id
     \param id l'identifiant du joueur
     \return un joueur ou false
     */
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

    /**
     \brief cherche un joueur par le debut de son nom
     \param name le debut du nom du joueur
     \return un tableau de joueur ou false
     */
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
    
    /**
     \brief cherche les joueur appartenant a l'equipe en fonction de son Id
     \param id l'identifiant de l'equipe
     \return un tableau de joueur ou null
     */
    public function search_byTeamId($id) {
	$query = $this->_bdd->prepare("select * from JOUEUR where IdTeam = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ($query->rowCount() != 0) {
	    $data = array();
	    $i = 0;
	    while ( $rep = $query->fetch() ) {
		$data[$i] = $rep;
		$photo = Photo::s_search_byId($this->_bdd, $rep['idPhoto']);
		if ( $photo != null ) {
		    $data[$i]['img'] = $photo['Fichier'];
		}
		$i++;
	    }
	    return $data;
	} else {
	    return null;
	}
    }

    /**
     \brief cherche tout les joueurs a un poste en fonction de l'Id du poste
     \param id l'identifiant du poste
     \return un tableau de joueur ou false
     */
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


    /**
     \brief insert un joueur dans le base 
     \param team l'identifiant de l'equipe
     \param nom le nom du joueur
     \param photo l'identifiant de la photo du joueur
     \param prenom le prenom du joueur
     \param poste l'identifiant du poste du joueur 
     \param desc la description du joueur
     \return vrai si reussi faux sinon
     */
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

    
    /**
     \brief supprime un joueur en fonction de son Id
     \param id l'identifiant du joueur
     \return vrai si reussi faux sinon
     */
    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from JOUEUR where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    


}




?>