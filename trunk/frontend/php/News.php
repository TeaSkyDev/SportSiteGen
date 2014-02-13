<?php

class News {
    
    private $_data = array();
    private $_bdd;
    private $_nb;

    public function __construct($bdd) {
	$this->_bdd = $bdd;
	$query = $bdd->query("select * from NEWS ORDER BY Id desc");
	if($query->rowCount() != 0) {
	    $this->_nb = 0;
	    while($d = $query->fetch()) {
		$this->_data[$this->_nb] = $d;
		$this->_nb++;
	    }
	}
    }
    
    public function get_content() {
	return $this->_data;
    }

    public function get_size() {
	return $this->_nb;
    }
    

    public function reload() {
	$query = $this->_bdd->query("select * from NEWS order by Id desc");
	if($query->rowCount() != 0) {
	    $this->_nb = 0;
	    while($d = $query->fetch()) {
		$_data[$this->_nb] = $d;
		$this->_nb++;
	    }
	}
    }

    /*
      ajoute une news dans la base
      retourne vrai si l'insertion a marcher faux sinon
     */
    public function add_news($titre, $date, $contenu, $IdPhoto, $auteur) {
	$query = $this->_bdd->prepare("insert into NEWS values(null, :titre, :date, :contenu, :idphoto, :auteur)");
	$query->bindParam(":titre", $titre);
	$query->bindParam(":date", $date);
	$query->bindParam(":contenu", $contenu);
	$query->bindParam(":idphoto", $IdPhoto);
	$query->bindParam(":auteur", $auteur);
	$query->execute();
	$count = $query->rowCount();
	return ($count == 1);
    }

    /*
      supprime la news en fonction de son Id
      elle retourne vrai si la suppression a reussi faux sinon
     */
    public function delete_news($id) {
	$query = $this->_bdd->prepare("delete * from NEWS where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	$count = $query->rowCount();
	return ($count == 1);
    }


    public function update_news($id, $titre, $date, $contenu, $IdPhoto, $auteur) {
	$query = $this->_bdd->prepare("update NEWS set titre = :titre, date = :date, contenu = :contenu, IdPhoto = :IdPhoto, auteur = :auteur where Id = :id");

	$query->bindParam(":id", $id);
	$query->bindParam(":titre", $titre);
	$query->bindParam(":date", $date);
	$query->bindParam(":contenu", $contenu);
	$query->bindParam(":IdPhoto", $IdPhoto);
	$query->bindParam(":auteur", $auteur);
	$query->execute();
	$count = $query->rowCount();
	return ($count == 1);
    }


    public function search_byId($id) {
	$query = $this->_bdd->prepare("select * from NEWS where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if($query->rowCount() != 0) {
	    return $query->fetch();
	} else {
	    return false;
	}
    }

    public function search_byDate($date) {
	$query = $this->_bdd->prepare("select * from NEWS where date = :date");
	$query->bindParam(":date", $date);
	$query->execute();
	if($query->rowCount() != 0) {
	    $return;
	    $i = 0;
	    while ($data = $query->fetch()) {
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

    //prend le nombre de news par page en entree
    public function get_nb_page($nb) {
	return $this->_nb / $nb;
    }



}


?>
