<?php

  /*
   ====================================================================
   Classe qui gere les News dans la base de donnees et le commentaires
   ====================================================================
   */

class News {
    
    private $_data = array(); /* les news de la base */
    private $_bdd; /* la base de donnees */
    private $_nb; /* le nombre de news */
    private $_com_data; /* les commentaires de la base */

    /**
     \brief construit l'objet 
     \param bdd la base de donnees
     \param param les elements du get ( v1 = 'lire_news' & v2={IdNews} OU news_com='true' & $_POST['id_news'] & $_POST['message'] )
     */
    public function __construct($bdd, $param = null) {
        $this->_bdd = $bdd;
	if(isset($param) && $param != null) {
            if($param['v1'] == "lire_news" && isset($param['v2'])) {
                $this->get_one_news($param['v2']);
		if ( isset($param['news_com']) && $param['news_com'] == 'true') {
		    if($this->add_com_byNewsId($_POST['id_news'], $_POST['message'])){
			header("Location:index.php?page=news&v1=lire_news&v2=".$param['v2']);
		    } else {
			//header("Location:index.php?page=err&msg=");	
		    }
		}
	    } else {
		$this->get_all_news();
	    }
	} else {
	    $this->get_all_news();
	}
    }

    /**
     \brief charge toute le news de la base
     \param void
     */
    public function get_all_news() {
        $query = $this->_bdd->prepare("select * from NEWS ORDER BY Id desc");
	$query->execute();
        if($query->rowCount() != 0) {
            $this->_nb = 0;
            while($d = $query->fetch()) {
                $photo = Photo::s_search_byId($this->_bdd, $d['IdPhoto']);
		$this->_data[$this->_nb] = $d;
		$this->_data[$this->_nb]['img'] = $photo['Fichier'];
                $this->_nb++;
            }
        }
    }

    /**
     \brief charge une seule news en fonction de son id 
     \param id l'identifiant de la news
     */
    public function get_one_news($id) {
        $query = $this->_bdd->query("select * from NEWS where Id = ".$id);
        if($query->rowCount() != 0) {
            $this->_nb = 1;
            $this->_data[0] = $query->fetch();
	    $photo = Photo::s_search_byId($this->_bdd, $this->_data[0]['IdPhoto']);
	    $this->_data[0]['img'] = $photo['Fichier'];
        }
	$this->_com_data = $this->get_com_byNewsId($id);
    }

    /**
     \brief le contenu des commentaires
     \param void 
     \return un tableau de commentaire
     */
    public function get_content_com() {
	return $this->_com_data;
    }

    /**
     \brief cherches les commentaires associe a une news en fonction de son id
     \param id l'identifiant de la news
     \return un tableau de commentaire ou false
     */
    public function get_com_byNewsId($id) {
    	$query = $this->_bdd->prepare("select * from NEWS_COM where idNews = :id");
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
	    return false;
	}
    }

    /**
     \bug il faut que $_SESSION['user']['id'] soit set 
     \brief insere un commentaire en fonction de l'id de la news 
     \param id l'identifiant de la news
     \param text le texte du commentaire
     \return vrai si reussi faux sinon
     */
    public function add_com_byNewsId($id, $text) {
	$date = date("Y-m-d H:i:s");

	$user = $_SESSION['user']['Id'];
	$query = $this->_bdd->prepare("insert into NEWS_COM values(null, :text, :date, :idnews, :iduser)");
	$query->bindParam(":text", $text);
	$query->bindParam(":date", $date);
	$query->bindParam(":idnews", $id);
	$query->bindParam(":iduser", $user);
	$query->execute();
	return $query->rowCount() == 1;
    } 

    /**
     \brief renvoi les news
     \param void
     \return un tableau de news
     */
    public function get_content() {
	return $this->_data;
    }

    /**
     \brief renvoi le nombre de news
     \param void
     \return le nomber de news
     */
    public function get_size() {
	return $this->_nb;
    }
    
    /**
     \brief recharge les news 
     \param void
     */
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
      \brief ajoute une news dans la base
      \param titre le titre de la news
      \param date la date de la news
      \param contenu le contenu de la news
      \param idPhoto l'identifiant de la photo 
      \param auteur le nom de l'auteur
      \return retourne vrai si l'insertion a marcher faux sinon
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
      \brief supprime la news en fonction de son Id
      \param id l'identifiant de la news
      \return elle retourne vrai si la suppression a reussi faux sinon
     */
    public function delete_news($id) {
	$query = $this->_bdd->prepare("delete * from NEWS where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	$count = $query->rowCount();
	return ($count == 1);
    }

    /**
     \brief met a jour une news en focntion de son identifiant
     \param id l'identifiant de la news
     \param titre le titre de la news
      \param date la date de la news
      \param contenu le contenu de la news
      \param idPhoto l'identifiant de la photo 
      \param auteur le nom de l'auteur
      \return vrai si reussi faux sinon
     */
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


    /**
     \brief cherche une news en fonction de son id
     \param id l'identifiant de la news
     \return une news ou false
     */
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

    /**
     \brief cherche une news en fonction du debut de son nom
     \param name le debut du nom de la news
     \return un tableau de news ou false
     */
    public function search_byName($name) {
	$name = $name."%";
	$query = $this->_bdd->prepare("select * from NEWS where titre like :name order by Id DESC");
	$query->bindParam(":name", $name);
	$query->execute();
	$data = array();
	$i = 0;
	while($rep = $query->fetch()) {
	    $data[$i] = $rep;
	    $i++;
	}
	return $data;
    }

    /**
     \brief cherche des news en fonction de la date
     \param date la date de parution
     \return un tableau de news ou false
     */
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

    /**
     \brief cherche les news entre deux indices
     \param from premiere news a charger
     \param to derniere news a charger
     \return un tableau de news ou false
     */
    public function get_content_FromTo($from, $to) {
	if ( isset($this->_data[$from]) ) {
	    $data = array();
	    $i = 0;
	    while ($from + $i <= $to && isset($this->_data[$from + $i])) {
		$data[$i] = $this->_data[$i + $from];
		$i++;
	    }
	    return $data;
	} else {
	    return false;
	}
    }

    /**
     \brief renvoi le nombre de page necessaire pour afficher des news
     \param nb le nombre de news par page
     \return le nombre de page
     */
    public function get_nb_page($nb) {
	return $this->_nb / $nb;
    }



}


?>
