<?php

class Equipe {

    private $_bdd;
    private $_nb;
    private $_data;

    public function __construct($bdd) {
	$this->_bdd = $bdd;

	$query = $bdd->query("select * from TEAM order by Id DESC");
	if($query->rowCount() > 0) {
	    $this->_nb = 0;
	    while($data = $query->fetch()) {
		$this->_data[$this->_nb] = $data;
		$this->_nb++;
	    }
	} 
    }

    public function get_content() {
	return $this->_data;
    }


    public function insert($nom, $photo, $categorie, $description) {
	$query = $this->_bdd->prepare("insert into TEAM values(null, :nom, :photo, :cat, :desc)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":photo", $photo);
	$query->bindParam(":cat", $categorie);
	$query->bindParam(":desc", $description);
	$query->execute();
	return $query->rowCount() == 1;
    }


    public function delete_byId($id) {
	$query = $this->_bdd->prepare("delete * from TEAM where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }


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