<?php

require_once("Match.php");
require_once("Equipe.php");

/*
 =========================================================
 Classe qui gere les tournoi et les matchs de tournoi
 =========================================================
 */

class Tournoi {
  
    private $_bdd; /* la base de donnees */
    private $_data; /* les donnees de tournoi */
    private $_nb; /* le nombre de tournoi */
    private $_match_data; /* les matchs de tournoi */
  
    /**
     \brief construit l'objet
     \param bdd la base de donnees
     \param param les valeur de get ( v1='lire_tour'&v2={IdTourn} )
     */
    public function __construct($bdd, $param = null) {
	$this->_bdd = $bdd;
	if ( isset($param) && $param != null ) {
	    if ( $param['v1'] == "lire_tourn" && isset($param['v2']) ) {
		$this->get_one_tournoi($param['v2']);
	    } else {
		$this->get_all_tournoi();
	    }
	} else {
	    $this->get_all_tournoi();
	}
    }
  
    /**
     \brief charge un tournoi en fonction de son id
     \param id l'identifiant du tournoi
     */
    public function  get_one_tournoi($id) {
	$query = $this->_bdd->prepare("select * from TOURNOI where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	$this->_nb = 0;
	if ( $query->rowCount() != 0 ) {
	    while ( $rep = $query->fetch() ) {
		$this->_data[$this->_nb] = $rep;
		$this->_nb++;
	    }
	}
	$this->_match_data = $this->get_match_byTouId($id);
    }


    /**
     \brief charge tout les tournoi
     \param void
     */
    public function get_all_tournoi() {
	$query = $this->_bdd->prepare("select * from TOURNOI order by id DESC");
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
     \brief cherche les match d'un tournoi en fonction de son id
     \param id l'identifiant du tournoi
     \return un tableau de match ou false
     */
    public function get_match_byTouId($id) {
	$query = $this->_bdd->prepare("select * from APPARTENIR_TOURNOI where IdTournoi = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ( $query->rowCount() != 0 ) {
	    $i = 0;
	    $match = new Match($this->_bdd);
	    $data = array();
	    while ( $rep = $query->fetch() ) {
		$data[$i] = $match->search_byId($rep['IdMATCHS']);
		$i++;
	    }
	    return $data;
	} else {
	    return null;
	}
    }

    
    /**
     \brief renvoi les info sur le tournoi
     \param void
     \return un tableau de tournoi
     */
    public function get_content() {
	return $this->_data;
    }
    
    /**
     \brief renvoi les matchs
     \param void
     \return un tableau de matchs
     */
    public function get_content_match() {
	return $this->_match_data;
    }

    /**
     \brief cherche les informations sur les matchs d'un tournoi pour pouvoir creer l'arbre
     \param id l'identifiant d'un tournoi
     \return un tableau de match organiser pour l'arbre ou null
     */
    public function get_treeTab_byId($id) {
	$query = $this->_bdd->prepare("select * from APPARTENIR_TOURNOI where IdTournoi = :id order by NumTour");
	$query->bindParam(":id", $id);
	$query->execute();
	if ( $query->rowCount() != 0 ) {
	    $match = new Match($this->_bdd);
	    $equipe = new Equipe($this->_bdd);
	    $i = 0;
	    $data = array();
	    $anc_numTour = 0;
	    while ( $rep = $query->fetch() ) {
		if ( $anc_numTour != $rep['NumTour'] ) {
		    $anc_numTour = $rep['NumTour'];
		    $i = 0;
		}
		$cur_match = $match->search_byId($rep['IdMATCHS']);
		$data[$rep['NumTour']][$i]['nom'] = $equipe->search_byId($cur_match['IdTeam1'])['Nom'];
		$data[$rep['NumTour']][$i+1]['nom'] = $equipe->search_byId($cur_match['IdTeam2'])['Nom'];

		if ( $cur_match['nbPoint1'] > $cur_match['nbPoint2'] ) {
		    $data[$rep['NumTour']][$i]['gagne'] = 'true';
		    $data[$rep['NumTour']][$i+1]['gagne'] = 'false';
		} else if ( $cur_match['nbPoint1'] < $cur_match['nbPoint2'] ) {
		    $data[$rep['NumTour']][$i]['gagne'] = 'false';
		    $data[$rep['NumTour']][$i+1]['gagne'] = 'true';
		} else {
		    $data[$rep['NumTour']][$i]['gagne'] = 'none';
		    $data[$rep['NumTour']][$i+1]['gagne'] = 'none';
		    
		}
		$i += 2;
	    }
	    if ( isset ( $data[0] ) && isset($data[log(count($data[0]), 2) - 1][0])) {
		if ( $data[log(count($data[0]), 2) - 1][0]['gagne'] == 'true') {
		    $data[log(count($data[0]), 2)][0]['nom'] =  $data[log(count($data[0]), 2) - 1][0]['nom'];
		} else if ($data[log(count($data[0]), 2) - 1][1]['gagne'] == 'true'){
		    $data[log(count($data[0]), 2)][0]['nom'] =  $data[log(count($data[0]), 2) - 1][1]['nom'];
		}
		$data[log(count($data[0]), 2)][0]['gagne'] = 'true';
	    }

	    return $data;
	} else {
	    return null;
	}
    }

    /**
     \brief ajoute un match a un touenoi
     \param id l'identifiant du tournoi
     \param idMatch l'identifiant du match
     \param numTour le numero de tour ( commencant a 0 )
     \return vrai si reussi faux sinon
     */
    public function add_match_byTouId($id, $idMatch, $numTour) {
	$query = $this->_bdd->prepare("insert into APPARTENIR_TOURNOI values(:id, :match, :tour)");
	$query->bindParam(":id", $id);
	$query->bindParam(":match", $idMatch);
	$query->bindParam(":tour", $numTour);
	$query->execute();
	return $query->rowCount() == 1;
    }


    /**
     \brief ajoute un match a un tournoi
     \param $bdd la base de donnee ou ajouter
     \param id l'identifiant du tournoi
     \param idMatch l'identifiant du match
     \param numTour le numero de tour ( commencant a 0 )
     \return vrai si reussi faux sinon
     */
    public function s_add_match_byTouId($bdd, $id, $idMatch, $numTour) {
	$query = $bdd->prepare("insert into APPARTENIR_TOURNOI values(:id, :match, :tour)");
	$query->bindParam(":id", $id);
	$query->bindParam(":match", $idMatch);
	$query->bindParam(":tour", $numTour);
	$query->execute();
	return $query->rowCount() == 1;
    }


    /**
     \brief ajout un tournoi 
     \param Nom le nom du tournoi
     \param Description la description
     \param DateDeb la date de debut
     \param DateFin la date de fin
     \return vrai si reussi faux sinon
    */
    public function insert($nom, $desc, $dated, $datef) {
	$query = $this->_bdd->prepare("insert into TOURNOI values(null, :nom, :desc, :date1, :date2)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $desc);
	$query->bindParam(":date1", $dated);
	$query->bindParam(":date2", $datef);
	$query->execute();
	return $query->rowCount() == 1;
    }
    


    /**
     \brief ajout un tournoi  (fonction statique)
     \param bdd la base de donnees
     \param Nom le nom du tournoi
     \param Description la description
     \param DateDeb la date de debut
     \param DateFin la date de fin
     \param NbEquipe le nombre d'equipe participante
     \return vrai si reussi faux sinon
    */
    public function s_insert($bdd, $nom, $desc, $dated, $datef, $nbequipe) {
	$query = $bdd->prepare("insert into TOURNOI values(null, :nom, :desc, :date1, :date2 , :nbequi)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":desc", $desc);
	$query->bindParam(":date1", $dated);
	$query->bindParam(":date2", $datef);
	$query->bindParam(":nbequi", $nbequipe);
	$query->execute();
	return $query->rowCount() == 1;
    }
    



    /**
     \brief calcule le gagnant d'un match
     \param data les information d'un match
     \return un id d'equipe ou null
     */
    private function calc_gagnant_byMatchData($data) {
	if ( isset($data['nbPoint1']) && isset($data['nbPoint2']) ) {
	    if ( $data['nbPoint1'] > $data['nbPoint2'] ) {
		return $data['IdTeam1'];
	    } else if ( $data['nbPoint1'] < $data['nbPoint2'] ) {
		return $data['IdTeam2'];
	    } else {
		return null;
	    }
	}
    }

    /**
     \brief calcule le prochain match en fonction de deux matchs
     \param id1 identifiant match1
     \param id2 identifiant match2
     \return deux id d'equipe ou null
     */
    public function calc_nextMatch_byMatchsId($id1, $id2) {
	$query1 = $this->_bdd->prepare("select * from MATCHS where Id = :id");
	$query2 = $this->_bdd->prepare("select * from MATCHS where Id = :id");
	$query1->bindParam(":id", $id1);
	$query2->bindParam(":id", $id2);
	$query1->execute();
	$query2->execute();
	if ( $query1->rowCount() != 0 && $query2->rowCount() != 0 ) {
	    $rep1 = $query1->fetch();
	    $rep2 = $query2->fetch();
	    $data = array();
	    $data['IdTeam1'] = $this->calc_gagnant_byMatchData($rep1);
	    $data['IdTeam2'] = $this->calc_gagnant_byMatchData($rep2);
	    return $data;
	} else {
	    return null;
	}
    }

    /**
     \brief calcule le prochain tour d'un tournoi 
     \param data un tableau de match de taille 2^x
     \return un tableau de paires d'identifiant d'equipe ou null
     */
    public function calc_Tournoi_byMatchsId($data) {
	$tou = array();
	if ( log(count($data), 2)*10%10 == 0 ) {
	    $j = 0;
	    for ( $i = 0 ; $i < count($data) ; $i+=2 ) {
		$tou[$j] = $this->calc_nextMatch_byMatchsId($data[$i]['Id'], $data[$i+1]['Id']);
		$j++;
	    }
	    return $tou;
	} else {
	    return null;
	}
    }
    

}


?>