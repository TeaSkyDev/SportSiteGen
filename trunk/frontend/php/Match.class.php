<?php

/*
 ==========================================================
 Classe qui gere les Matchs dans la Base de donnees
 ==========================================================
 */


class Match {

    private $_bdd; /* base de donnees rattache */
    private $_smarty; //moteur de template smarty

    /**
    \brief construit l'objet
    \param bdd la base de donnees
    \param param l'id du match (optionnel)
     */
    public function __construct($bdd, $smarty) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
    }

    public function get_content() {
        if(isset($_GET['season'])) {
            //return $this->get_matchs_by_season($_GET['season']);
        } else if(isset($_GET['id_match'])) {
            //return $this->get_match_by_id($_GET['id_match']);
        } else {
            return $this->get_all_matchs();
        }
    }

    /**
     @brief recupere tout le match de la base
     @param void
     @return void
     */
    public function get_all_matchs() {
        /* On récupère la dernière saison */
        $last_saison = $this->_bdd->query("SELECT * FROM saison ORDER BY Saison DESC")->fetch();

        $query = $this->_bdd->query("SELECT * FROM `match` WHERE IdSaison = ".$last_saison['Id']." ORDER BY Id DESC");
        $data_matchs = array();
        $i = 0;
        if( $query->rowCount() > 0) {
            while ($data = $query->fetch()) {

                //on va chercher le nom des deux équipes
                $data_matchs[$i] = $data;
                $data_matchs[$i]['name_team1'] = Equipe::s_search_byId($this->_bdd, $data['IdTeam1']);
                $data_matchs[$i]['name_team2'] = Equipe::s_search_byId($this->_bdd, $data['IdTeam2']);
                $data_matchs[$i]['Saison'] = $last_saison['Saison'];
                $i++;
            }
        }

        $this->_smarty->assign("Matchs", $data_matchs);
        return $this->_smarty->fetch(TEMPLATE."/html/match.html");
    }

    /**
     * @brief renvoie la page à afficher des matchs en fonction de la saison donnée
     * @param $season
     */
    public function get_matchs_by_season($saison) {
        $query = $this->_bdd->query("select * from MATCHS where IdSaison = ".$saison." order by Id desc");
        $data_matchs = array();
        if($query->rowCount() > 0) {
            $i = 0;
            while($data = $query->fetch()) {
                $data_matchs[$i] = $data;
                //$data_matchs[$i]['Saison'] = $this->_bdd->query("select Saison from SAISONS where Id = ".$idsaison)->fetch()['Saison'];
                $i++;
            }
        }
    }

    /*
     \brief cherche un match dans la base de donnes
     \param l'identifiant du match
     \return void
     */
    public function get_match_by_id($id) {
        $query = $this->_bdd->prepare("select * from MATCHS where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $data_match = array();
        if ( $query->rowCount() == 1 ) {
            $data_match[0] = $query->fetch();
            $data_match[0]['Saison'] = $this->_bdd->query("select Saison from SAISONS where Id = ".$data_match[0]['IdSaison'])->fetch()['Saison'];
        }
        //$this->_fiche = $this->get_fiche_match($id);
    }


    /*
     \brief recherche la fiche d'un match
     \param 'identifiant d'un match
     \return une fiche de match
     */
    /*public function get_fiche_match($id) {
        $query = $this->_bdd->prepare("select * from FICHE where IdMatch = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        if ( $query->rowCount() != 0 ) {
            return $query->fetch();
        } else {
            return null;
        }
    }
*/




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
        $query->bindParam(":idsaison", $idsaison);
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
        $query->bindParam(":joue", $jouer);
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
  /*  public function get_content_FromTo($from, $to) {
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

*/



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