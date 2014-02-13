<?php

class Calendrier {

    private $_bdd;
    private $_nb;
    private $_data;


    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$query = $bdd->query("select * from EVENEMENT order by id DESC");
	$this->_nb = 0;
	if ( $query->rowCount() > 0 ) {
	    while ( $data = $query->fetch() ) {
		$this->_data[$this->_nb] = $data;
		$this->_nb++;
	    } 
	}
    }

    public function get_content() {
	return $this->_data;
    }


    public function reload() {
	$query = $this->_bdd->query("select * from EVENEMENT order by id desc");
	if( $query->rowCount() > 0 ) {
	    $this->_nb = 0;
	    while( $data = $query->fetch() ) {
		$this->_data[$this->_nb] = $data;
		$this->_nb++;
	    }
	}
    }


    public function add_evenement($titre, $date, $contenu, $location) {
	$query = $this->_bdd->prepare("insert into EVENEMENT values(null,:titre, :contenu, :date, :location)");
	$query->bindParam(":titre",$titre);
	$query->bindParam(":date",$date);
	$query->bindParam(":contenu",$contenu);
	$query->bindParam(":location",$location);
	$query->execute();
	return ($query->rowCount() == 1);
    }

    public function delete_evenement($id) {
	$query = $this->_bdd->prepare("delete * from EVENEMENT where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return ($query->rowCount() == 1);
    }
    

    public function update_evenement($id, $titre, $date, $contenu, $location) {
	$query = $this->_bdd->prepare("Update EVENEMENT set titre = :titre, date = :date, contenu = :contenu, location = :location where Id = :id");
	$query->bindParam(":id",$id);
	$query->bindParam(":titre",$titre);
	$query->bindParam(":date",$date);
	$query->bindParam(":contenu",$contenu);
	$query->bindParam(":location",$location);
    }


    public function search_byId($id) {
	$query = $this->_bdd->prepare("select * from EVENEMENT where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }


    public function search_byName($name) {
	$name = $name."%";
	$query = $this->_bdd->prepare("select * from NEWS where titre like :name order bu Id DESC");
	$query->bindParam(":name", $name);
	$query->execute();
	$i = 0;
	$data = array();
	while ($rep = $query->fetch()) {
	    $data[$i] = $rep;
	    $i++;
	}
	return $data;
    }


    public function search_byDate($date) {
	$query = $this->_bdd->prepare("select * from EVENEMENT where date = :date");
	$query->bindParam(":date", $date);
	$query->execute();
	if($query->rowCount() != 0) {
	    $return;
	    $i = 0;
	    while($data = $query->fetch()) {
		$return[$i] = $data;
		$i++;
	    }
	    return $return;
	} else {
	    return false;
	}
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

}






?>
