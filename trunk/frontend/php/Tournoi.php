<?php



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




}


?>