<?php

class Match {

    private $_bdd;
    private $_data;
    private $_nb;


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

    public function get_content() {
	return $this->_data;
    }


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

    public function get_content_FromTo($from, $to) {
	$data = array();
	$i = 0;
	while ($from + $i <= $to && isset($this->_data[$from + $i])) {
	    $data[$i] = $this->_data[$i + $from];
	    $i++;
	}
	return $data;
    }


    public function get_nb_page($nb) {
	return $this->_nb / $nb;
    }


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