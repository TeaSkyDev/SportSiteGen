<?php


class Photo {

    private $_bdd;
    private $_data;
    private $_nb;

    public function __construct($bdd) {
	$this->_bdd = $bdd;

	$query = $bdd->query("select * from PHOTO order by Id");
	if ($query->rowCount() > 0) {
	    $this->_nb = 0;
	    while ($data = $query->fetch()) {
		$this->_data[$this->_nb] = $data;
		$this->_nb++;
	    }
	}
    }


    public function get_content() {
	return $this->_data;
    }
    

    public function search_byId($id) {
	if(isset($this->_data[$id])) {
	    return $this->_data[$id];
	} else {
	    return false;
	}
    }


    public function insert($nom, $fichier, $commentaire) {
	$query = $this->_bdd->prepare("insert into PHOTO value(null, :nom, :fichier, :com)");
	$query->bindParam(":nom", $nom);
	$query->bindParam(":fichier", $fichier);
	$query->bindParam(":com", $commentaire);
	$query->execute();
	return $query->rowCount() == 1;
    }


}



?>