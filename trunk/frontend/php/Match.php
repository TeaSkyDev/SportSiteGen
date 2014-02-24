<?php

  /*
   ==========================================================
   Classe qui gere les Matchs dans la Base de donnees
   ==========================================================
   */


class Match {

    private $_bdd; /* base de donnees rattache */
    private $_data; /* les donnees de matchs de la base */
    private $_nb; /* le nombre de matchs */


    /**
     \brief construit l'objet
     \param bdd la base de donnees
     */
    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$query = $bdd->query("select * from MATCHS order by Id DESC");
	$this->_nb = 0;
	if( $query->rowCount() > 0) {
	    while ($data = $query->fetch()) {
		$this->_data[$this->_nb] = $data;
		$this->_nb++;
	    }
	}
    }
    
    /**
     \brief renvoi les donnees sur les matchs
     \param void
     \return un tableau de matchs
     */
    public function get_content() {
	return $this->_data;
    }

    /**
     \brief insere un match dans la base 
     \param cat l'identifiant de la categorie 
     \param team1 l'identifiant de la premiere equipe
     \param team2 l'identifiant de la deuxieme equipe
     \param point1 le nombre de point de la premiere equipe ( ou null )
     \param point2 le nombre de point de la deuxieme equipe ( ou null )
     \param date la date du match
     \param lieu le lieu du match
     \param comm commentaire sur le match
     \return vrai si reussi faux sinon
     */
    public function insert($cat, $team1, $team2, $point1, $point2, $date, $lieu, $comm) {
	$query = $this->_bdd->prepare("insert into MATCHS values(null, :cat, :team1, :team2, :point1, :point2, :date, :lieu, :comm)");
	$query->bindParam(":cat", $cat);
	$query->bindParam(":team1", $team1);
	$query->bindParam(":team2", $team2);
	$query->bindParam(":point1", $point1);
	$query->bindParam(":point2", $point2);
	$query->bindParam(":date", $date);
	$query->bindParam(":lieu", $lieu);
	$query->bindParam(":comm", $comm);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief renvoi une tableau de match entre deux indices
     \param from premier match a renvoyer
     \param to deuxieme match a renvoyer
     \return un tableau de match ou false
     */
    public function get_content_FromTo($from, $to) {
	if ( isset ( $this->_data[$from] ) ) {
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
     \brief renvoi le nombre de page necessaire pour afficher des match
     \param nb le nombre de match par page
     \return le nombre de page 
     */
    public function get_nb_page($nb) {
	return $this->_nb / $nb;
    }


    /**
     \brief cherche un match en fonction de son id
     \param id l'identifiant du match
     \return un match ou false
     */
    public function search_byId($id) {

	$query = $this->_bdd->prepare("select * from MATCHS where Id = :id");
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