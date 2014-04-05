<?php

/*
 ==========================================================
 Classe qui gere les Matchs dans la Base de donnees
 ==========================================================
 */


class Match {

    private $_bdd; /* base de donnees rattache */
    private $_data; /* les donnees de matchs de la base */
    private $_nb; /* le nombre de matchs */
    private $_fiche; /* une fiche de match */


    /**
    \brief construit l'objet
    \param bdd la base de donnees
    \param param l'id du match (optionnel)
     */
    public function __construct($bdd, $param = null) {
        $this->_bdd = $bdd;
        if ( isset ($param) && $param!=null) {
            if ( $param['v1'] == "lire_match" && isset($param['v2']) ) {
                $this->get_one_match($param['v2']);
            } else {
                $this->get_all_match();
            }
        } else {
            $this->get_all_match();
        }
    }

    /*
     \brief recupere tout le match de la base
     \param void
     \return void
     */
    public function get_all_match() {
        $query = $this->_bdd->query("select * from MATCHS order by Id DESC");
        $this->_nb = 0;
        if( $query->rowCount() > 0) {
            while ($data = $query->fetch()) {
                $this->_data[$this->_nb] = $data;
                $this->_data[$this->_nb]['Saison'] = $this->_bdd->query("select Saison from SAISONS where Id = ".$data['IdSaison'])->fetch()['Saison'];
                $this->_nb++;
            }
        }
    }



    /*
     \brief cherche un match dans la base de donnes
     \param l'identifiant du match
     \return void
     */
    public function get_one_match($id) {
        $query = $this->_bdd->prepare("select * from MATCHS where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        if ( $query->rowCount() == 1 ) {
            $this->_nb = 1;
            $this->_data[0] = $query->fetch();
            $this->_data[0]['Saison'] = $this->_bdd->query("select Saison from SAISONS where Id = ".$data['IdSaison'])->fetch()['Saison'];
        }
        $this->_fiche = $this->get_fiche_match($id);
    }


    /*
     \brief recherche la fiche d'un match
     \param 'identifiant d'un match
     \return une fiche de match
     */
    public function get_fiche_match($id) {
        $query = $this->_bdd->prepare("select * from FICHE where IdMatch = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        if ( $query->rowCount() != 0 ) {
            return $query->fetch();
        } else {
            return null;
        }
    }


    /**
    \brief renvoi les donnees sur les matchs
    \param void
    \return un tableau de matchs
     */
    public function get_content() {
        return $this->_data;
    }

    public function get_fiche_content() {
        return $this->_fiche;
    }


    /**
    \brief insere un match dans la base
    \param joue indique si le matche a été joué ou non
    \param team1 l'identifiant de la premiere equipe
    \param team2 l'identifiant de la deuxieme equipe
    \param point1 le nombre de point de la premiere equipe ( ou null )
    \param point2 le nombre de point de la deuxieme equipe ( ou null )
    \param date la date du match
    \param lieu le lieu du match
    \param comm commentaire sur le match
    \param idsaison id de la saison
    \return vrai si reussi faux sinon
     */
    public function insert($joue, $team1, $team2, $point1, $point2, $date, $lieu, $comm, $idsaison) {
        $query = $this->_bdd->prepare("insert into MATCHS values(null, :joue, :team1, :team2, :point1, :point2, :date, :lieu, :comm, :idsaison)");
        $query->bindParam(":joue", $joue);
        $query->bindParam(":team1", $team1);
        $query->bindParam(":team2", $team2);
        $query->bindParam(":point1", $point1);
        $query->bindParam(":point2", $point2);
        $query->bindParam(":date", $date);
        $query->bindParam(":lieu", $lieu);
        $query->bindParam(":comm", $comm);
        $queyr->bindParam(":idsaison", $idsaison);
        $query->execute();
        return $query->rowCount() == 1;
    }

    /** (static)
    \brief insere un match dans la base
    \param joue indique si le matche a été joué ou non
    \param team1 l'identifiant de la premiere equipe
    \param team2 l'identifiant de la deuxieme equipe
    \param point1 le nombre de point de la premiere equipe ( ou null )
    \param point2 le nombre de point de la deuxieme equipe ( ou null )
    \param date la date du match
    \param lieu le lieu du match
    \param comm commentaire sur le match
    \param idsaison id de la saison
    \return vrai si reussi faux sinon
     */
    static public function s_insert($bdd, $joue, $team1, $team2, $point1, $point2, $date, $lieu, $comm, $idsaison) {
        $query = $bdd->prepare("insert into MATCHS values(null, :joue, :team1, :team2, :point1, :point2, :date, :lieu, :comm, :idsaison)");
        $query->bindParam(":joue", $joue);
        $query->bindParam(":team1", $team1);
        $query->bindParam(":team2", $team2);
        $query->bindParam(":point1", $point1);
        $query->bindParam(":point2", $point2);
        $query->bindParam(":date", $date);
        $query->bindParam(":lieu", $lieu);
        $query->bindParam(":comm", $comm);
        $query->bindParam(":idsaison", $idsaison);
        $query->execute();
        return $query->rowCount() == 1;
    }


    /**
       \brief met a jour un match dans la base de données (fonction statique)
       \param bdd la base de donnees rattache 
       \param id l'identifiant a mettre a jour
       \param team1 l'identifiant de la premiere equipe
       \param team2 l'identifiant de la deuxieme equipe
       \param point1 le nombre de point de la premiere equipe
       \param point2 le nombre de point de la deuxieme equipe
       \param date la date du match
       \param lieu le lieu du match
       \param comm le commentaire du match
       \param idsaison id de la saison
       \return vrai si reussi faux sinon
     */
    static public function s_update($bdd, $id, $jouer, $team1, $team2, $point1, $point2, $date, $lieu, $comm, $idsaison) {
        $query = $bdd->prepare("UPDATE MATCHS SET joue=:joue,IdTeam1=:id1,IdTeam2=:id2,nbPoint1=:poi1,nbPoint2=:poi2,DateMATCHS=:date,Lieu=:lieu,Commentaires=:com,IdSaison=:idsaison WHERE Id=:id");
        $query->bindParam(":joue", $joue);
        $query->bindParam(":id1", $team1);
        $query->bindParam(":id2", $team2);
        $query->bindParam(":poi1", $point1);
        $query->bindParam(":poi2", $point2);
        $query->bindParam(":date", $date);
        $query->bindParam(":lieu", $lieu);
        $query->bindParam(":com", $comm);
        $query->bindParam(":idsaison", $idsaison);
	    $query->bindParam(":id", $id);
        $query->execute();
        return $query->rowCount() == 1;
    }



    /**
    \brief renvoi une tableau de match entre deux indices
    \param from premier match a renvoyer
    \param to deuxieme match a renvoyer
    \return un tableau de match ou false
     */
    public function get_content_FromTo($from, $to) {
        if ( isset ( $this->_data[$from] ) ) {
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
    \brief renvoi le nombre de page necessaire pour afficher des match
    \param nb le nombre de match par page
    \return le nombre de page
     */
    public function get_nb_page($nb) {
        return $this->_nb / $nb;
    }


    /**
    \brief cherche un match en fonction de son id
    \param id l'identifiant du match
    \return un match ou false
     */
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



    /**
       \brief supprime les matchs en focntion de l'identifiant d'une equipe (statique)
       \param bdd la base de donnees
       \param id l'identifiant de l'equipe
       \return vrai si reussi faux sinon
     */
    static public function s_delete_byTeamId($bdd, $id) {
	$query = $bdd->prepare("delete from MATCHS where IdTeam1=:id or IdTeam2=:id");
	$query->bindParam(":id", $id);
	$query->execute();
	return $query->rowCount() != 0;
    }





}




?>