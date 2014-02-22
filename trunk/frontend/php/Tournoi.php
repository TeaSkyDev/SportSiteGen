<?php

require_once("Match.php");
require_once("Equipe.php");

class Tournoi {
  
    private $_bdd;
    private $_data;
    private $_nb;
    private $_match_data;
  
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


    public function get_content() {
	return $this->_data;
    }

    public function get_content_match() {
	return $this->_match_data;
    }


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
	    }

	    return $data;
	} else {
	    return null;
	}
    }



}


?>