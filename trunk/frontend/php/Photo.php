<?php


/*
 ==============================================================
 Classe qui gere les photo dans la base de donnees
 ==============================================================
 */

class Photo {

    private $_bdd; /* la base de donnees */
    private $_data; /* les photos */
    private $_nb; /* le nombre de photo */

    /**
    \brief construit les photo
    \param bdd la base de donnees
     */
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

    /**
    \brief renvoi les donnees des photo
    \param void
    \return un tableau de photo
     */
    public function get_content() {
        return $this->_data;
    }


    /**
    \brief cherche une photo en fonction de son identifiant
    \param id l'identifiant de la photo
    \return une photo ou null
     */
    public function search_byId($id) {
	$query = $this->_bbd->prepare("select * from PHOTO where Id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	if ( $query->rowCount == 1 ) {
	    return $query->fetch();
	} else {
	    return null;
	}
    }

    /**
    \brief cherche une photo en fonction de son identifiant (static)
    \param id l'identifiant de la photo
    \return une photo ou false
     */
    public static function s_search_byId($bdd, $id) {
        $query = $bdd->prepare("select * from PHOTO where Id = :id");
        $query->execute(array(":id" => $id));
        if($query->rowCount() > 0) {
            return $query->fetch();
        } else {
            return false;
        }
    }

    /**
    \brief ajoute une photo a la base de donnees
    \param nom le nom de la photo
    \param fichier le nom du fichier de la photo
    \param commentaire les commentaires sur la photo
    \return vrai si reussi faux sinon
     */
    public function insert($nom, $fichier, $commentaire) {
        $query = $this->_bdd->prepare("insert into PHOTO value(null, :nom, :fichier, :com)");
        $query->bindParam(":nom", $nom);
        $query->bindParam(":fichier", $fichier);
        $query->bindParam(":com", $commentaire);
        $query->execute();
        return $query->rowCount() == 1;
    }

    public static function s_insert($bdd, $fichier, $com) {
        $query = $bdd->prepare("insert into PHOTO value(null, :nom, :fichier, :com)");
        $query->bindParam(":nom", $nom);
        $query->bindParam(":fichier", $fichier);
        $query->bindParam(":com", $commentaire);
        $query->execute();

        if($query->rowCount() == 1) {
            return -1;
        } else {
            $reponse = $bdd->query('select max(Id) AS last from PHOTO');
            while ($data = $reponse->fetch()){ $res = $data['last'];}
            return $res;
        }
    }

    /**
    \brief supprime une photo en focntion de son id
    \param id l'identifiant de la photo
    \return vrai si reussi faux sinon
     */
    public function delete_byId($id) {
        $query = $this->_bdd->prepare("delete * from PHOTO where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->rowCount() == 1;
    }



}



?>