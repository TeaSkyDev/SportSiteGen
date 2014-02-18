<?php

class Calendrier {

    private $_bdd;
    private $_nb;
    private $_data;
    private $_com_data;


    public function __construct($bdd, $param = null) {
	$this->_bdd = $bdd;
	if ( isset($param) && $param != null ) {
	    if ( $param['v1'] == "lire_event" && isset($param['v2']) ) {
		$this->get_one_event($param['v2']);
		if ( isset($param['news_com']) && $param['news_com'] == 'true') {
		    if ( $this->add_com_byCalId($_POST['id_cal'], $_POST['message']) ) {
			header("Location:index.php?page=calendrier&v1=lire_event&v2=".$param['v2']);

		    } else {
			
		    }
		}
	    } else {
		$this->get_all_event();
	    }
	} else {
	    $this->get_all_event();
	}
    }


    public function get_content_com() {
	return $this->_com_data;
    }


    public function get_one_event($id) {
	$query = $this->_bdd->prepare("select * from EVENEMENT where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	$this->_nb = 0;
	if ( $query->rowCount() > 0 ) {
	    while ( $d = $query->fetch() ) {
		$this->_data[$this->_nb] = $d;
		$this->_nb++;
	    }
	}
	$this->_com_data = $this->get_com_byCalId($id);
    }


    public function get_all_event() {
	$query = $this->_bdd->query("select * from EVENEMENT order by id DESC");
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
    
    public function get_com_byCalId($id) {
	$query = $this->_bdd->prepare("select * from EVENEMENT_COM where idEvenement = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ($query->rowCount() > 0 ) {
	    $data = array();
	    $i = 0;
	    $profil = new Profil($this->_bdd);
	    while ( $rep = $query->fetch() ) {
		$data[$i] = $rep;
		$data[$i]['utilisateur'] = $profil->search_byId($rep['idUtilisateur'])['Pseudo'];
		$i++;
	    }
	    return $data;
	} else {
	    return null;
	}
    }


    public function add_com_byCalId($id, $contenu) {
	$date = date("Y-m-d H:i:s");
	$user = $_SESSION['user']['Id'];
	$query = $this->_bdd->prepare("insert into EVENEMENT_COM values(null, :text, :date, :idnews, :iduser)");
	$query->bindParam(":text", $contenu);
	$query->bindParam(":date", $date);
	$query->bindParam(":idnews", $id);
	$query->bindParam(":iduser", $user);
	$query->execute();
	return $query->rowCount() == 1;

    }


    public function delete_com_byId($id) {
	$query = $this->_bdd->prepare("delete * from EVENEMT_COM where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    public function search_byName($name) {
	$name = $name."%";
	$query = $this->_bdd->prepare("select * from EVENEMENT where titre like :name order bu Id DESC");
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
