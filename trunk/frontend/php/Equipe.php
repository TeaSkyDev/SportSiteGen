<?php


  /*
   ====================================================
   Classe qui gere les equipes dans la base de donnees
   ====================================================
  */


class Equipe {

    private $_bdd; /* la base rattache a l'objet */
    private $_nb; /* le nombre d'equipe chargees */
    private $_data; /* les equipes chargees */


    /**
     \brief construit l'objet
     \param bdd la base de donne 
     */
    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$this->_nb = 0;
	$query = $bdd->prepare("select * from TEAM order by Id DESC");
	$query->execute();
	if($query->rowCount() > 0) {
	    while($data = $query->fetch()) {
		$this->_data[$this->_nb] = $data;
		$photo = Photo::s_search_byId($this->_bdd, $data['idPhoto']);
		if ( $photo != null ) {
		    $this->_data[$this->_nb]['img'] = $photo['Fichier'];
		}
		$this->_nb++;
	    }
	} 
    }

    /**
     \brief renvoi les donne chargees
     \param void
     \return un tableau d'equipes
     */
    public function get_content() {
	return $this->_data;
    }


    /**
     \brief ajoute une equipe a la base de donnee
     \param nom le nom de l'equipe
     \param photo l'identifiant de la photo de l'equipe
     \param categorie l'identifiant de la categorie de l'equipe
     \param description description de l'equipe
     */
    public function insert($nom, $photo, $categorie, $description) {
	$query = $this->_bdd->prepare("insert into TEAM values(null, :nom, :photo, :cat, :desc)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":photo", $photo);
	$query->bindParam(":cat", $categorie);
	$query->bindParam(":desc", $description);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief supprime une equipe en fonction de son id
     \param id l'identifiant de l'equipe
     \return vrai si la suppression a fonctionner faux sinon
     */
    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from TEAM where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief cherche une equipe en fonction de son nom
     \param name le nom de l'equipe ( debut du nom )
     \return renvoi une tableau d'equipe ou false
     */
    public function search_byName($name) {
	$name = $name."%";
	$query = $this->_bdd->prepare("select * from TEAM where Nom like :name");
	$query->bindParam(":name", $name);
	$query->execute();
	if( $query->rowCount() != 0) {
	    $data = array();
	    $i = 0;
	    while($rep = $query->fetch()) {
		$data[$i] = $rep;
	    }
	    return $data;
	}
	return false;
    }


    /**
     \brief cherche une equipe en fonction de son identifiant
     \param id l'identifiant de l'equipe
     \return renvoi l'equipe ou false
     */
    public function search_byId($id) {
	$query = $this->_bdd->prepare("select * from TEAM where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ($query->rowCount() > 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }


    /**
     \brief renvoi le equipe entre une debut et une fin
     \param from la premiere equipe a charger
     \param to la derniere equipe a charger
     \return un tableau d'equipe ou false
     */
    public function get_content_FromTo($from, $to) {
	if ( isset( $this->_data[$from] ) ) {
	    $data = array();
	    $i = 0;
	    while ($from + $i <= $to && isset($this->_data[$from + $i])) {
		$data[$i] = $this->_data[$i + $from];
		$i++;
	    }
	    return $data;
	} else {
	    return false;
	}
    }

    /**
     \brief renvoi le nombre de page necessaire pour afficher des equipes
     \param nb le nomrbre d'equipe a afficher par page
     \return le nombre de page necessaire 
     */
    public function get_nb_page($nb) {
	return $this->_nb / $nb;
    } 




}

?>