<?php

  /*
   ============================================================
   Class qui cherche les evenement dans la base de donnees
   =============================================================
  */


class Calendrier {

    private $_bdd; /* base de donne rattache a la classe */
    private $_nb; /* nombre d'evenement present dans la variable _data */
    private $_data; /* les evenements present dans la base */
    private $_com_data; /* les commentaires en rapport avec les evenements */


    /**
     \brief construit l'objet
     \param bdd la base a laquelle la classe sera rattache
     \param param les valeur du get ( avec v1 = 'lire_event' et v2= {idEvent} pour lire les coms )
     */
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

    /**
     \brief renvoi les commentaires charger dans la base
     \param void 
     \return tableau de commentaires
     */
    public function get_content_com() {
	return $this->_com_data;
    }


    /**
     \brief charge un evenement en fonction de son Id
     \param id l'identifiant de l'evenement 
     \return void
     */
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

    

    /**
     \brief charge tout les evenements de la base
     \param void
     \return void
     */
    public function get_all_event() {
	$query = $this->_bdd->prepare("select * from EVENEMENT order by id DESC");
	$query->execute();
	$this->_nb = 0;
	if ( $query->rowCount() > 0 ) {
	    while ( $data = $query->fetch() ) {
		$this->_data[$this->_nb] = $data;
		$this->_nb++;
	    } 
	}
	
    }

    
    /**
     \brief renvoi tout les evenements charge
     \param void
     \return le tableau d'evenement
     */
    public function get_content() {
	return $this->_data;
    }

    
    /**
     \brief recharge la base pour prendre en compte les modifications
     \param void
     \return void
     */
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


    /**
     \brief ajoute un evenement a la base 
     \param titre le titre de l'evenement
     \param data la date de l'evenement
     \param contenu le contenu de l'evenement
     \param location le lieu de l'evenement
     \return renvoi vrai si l'insertion a reussi faux sinon
    */
    public function add_evenement($titre, $date, $contenu, $location) {
	$query = $this->_bdd->prepare("insert into EVENEMENT values(null,:titre, :contenu, :date, :location)");
	$query->bindParam(":titre",$titre);
	$query->bindParam(":date",$date);
	$query->bindParam(":contenu",$contenu);
	$query->bindParam(":location",$location);
	$query->execute();
	return ($query->rowCount() == 1);
    }

    /**
     \brief supprime un evenement de la base
     \param id identifiant de l'evenement
     \return renvoi si vrai si la suppression a reussi faux sinon
     */
    public function delete_evenement_byId($id) {
	$query = $this->_bdd->prepare("delete * from EVENEMENT where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return ($query->rowCount() == 1);
    }
    
    /**
     \brief met a jour un evenement en fonction de son identifiant 
     \param id identifiant de l'evenement a mettre a jour
     \param titre titre de l'evenement
     \param date date de l'evenement
     \param contenu contenu de l'evenement
     \param location lieu de l'evenement
     \return renvoi vrai si la mise a jour a reussi faux sinon
     */
    public function update_evenement_byId($id, $titre, $date, $contenu, $location) {
	$query = $this->_bdd->prepare("Update EVENEMENT set titre = :titre, date = :date, contenu = :contenu, location = :location where Id = :id");
	$query->bindParam(":id",$id);
	$query->bindParam(":titre",$titre);
	$query->bindParam(":date",$date);
	$query->bindParam(":contenu",$contenu);
	$query->bindParam(":location",$location);
	$query->execute();
	return ($query->rowCount() == 1);
    }


    /**
     \brief recherche un evenement en fonction de son identifiant
     \param id l'identifiant de l'evenement
     \return un evenement sous forme de tableau
     */
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
    
    /**
     \brief cherche les commentaire associe a un evenement en fonction de son id
     \param id l'identifiant de l'evenement
     \return un tableau de commentaire ou null si il n'y en as pas
     */
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

    /**
     \brief ajoute un commentaire a un evenement en fonction de son id
     \param id identifiant de l'evenement
     \param contenu le contenu du commentaire
     \return renvoi vrai si l'ajout a reussi faux sinon
     */
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


    /**
     \brief supprime un commentaire en fonction de son identifiant
     \param id identifiant du commentaire
     \return renvoi vrai si la suppression a reussi faux sinon
     */
    public function delete_com_byId($id) {
	$query = $this->_bdd->prepare("delete * from EVENEMT_COM where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() == 1;
    }

    /**
     \brief recherche un evenement commencant par nom
     \param name le debut du nom de l'evenement
     \return un tableau d'evenement ou false
     */
    public function search_byName($name) {
	$name = $name."%";
	$query = $this->_bdd->prepare("select * from EVENEMENT where titre like :name order bu Id DESC");
	$query->bindParam(":name", $name);
	$query->execute();
	if ( $query->rowCount() != 0 ) { 
	    $i = 0;
	    $data = array();
	    while ($rep = $query->fetch()) {
		$data[$i] = $rep;
		$i++;
	    }
	    return $data;
	} else {
	    return false;
	}
    }

    /**
     \brief recherche les evenement en fonction de leur date
     \param date la date des evenements
     \return un tableau d'evenement ou false
     */
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

    /**
     \brief cherche les evenement a partir d'un certain point jusqu'a un autre
     \brief l'evenement from doit exister mais pas forcement le to ( dans ce cas on s'arrete a la fin des donnes )
     \param from premiere evenement a prendre
     \param to dernier evenement a prendre
     \return renvoi un tableau d'evenement ou null
    */
    public function get_content_FromTo($from, $to) {
	if ( isset ( $this->_data[$from] ) ){
	    $data = array();
	    $i = 0;
	    while ($from + $i <= $to && isset($this->_data[$from + $i])) {
		$data[$i] = $this->_data[$i + $from];
		$i++;
	    }
	    return $data;
	} else {
	    return null;
	}
    }

    /**
     \brief renvoi le nombre de page necessaire a l'affichage de toute les news
     \param nb le nombre d'evenement affiche par page
     \return le nombre de page necessaire
     */
    public function get_nb_page($nb) {
	return $this->_nb / $nb;
    }
    
}






?>
