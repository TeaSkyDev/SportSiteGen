<?php

  /*
   ============================================================
   Classe qui cherche les evenement dans la base de donnees
   =============================================================
  */


class Calendar {

    private $_bdd; /* base de donne rattache a la classe */
    private $_smarty; /* moteur de template */

    /**
     \brief construit l'objet
     \param bdd la base a laquelle la classe sera rattache
     \param smarty moteur de template
     */
    public function __construct($bdd, $smarty) {
	    $this->_bdd = $bdd;
        $this->_smarty = $smarty;
    }

    /**
     * @brief permet d'obtenir le code affichant les events, un event en particulier, ..
     * @return mixed
     */
    public function get_content() {
        //on vérifie d'abord si une action est demandée (lire une news, ajouter un commentaire...)
        if(isset($_GET['action'])) {
            if($_GET['action'] == "read_event" && isset($_GET['id_event'])) {
                if(isset($_GET['add_event_com']) && $_GET['add_event_com'] == "true") {
                    if(!$this->add_com_event()) {
                        return Message::msg("Erreur lors de l'ajout du commentaire !", "calendar", $this->_smarty);
                    }
                }
                $this->get_event($_GET['id_event']);
                return $this->_smarty->fetch(TEMPLATE."/html/calendar_simple_event.html");
            } else {
                return Message::msg("Erreur dans les arguments.", "calendar", $this->_smarty);
            }
        } else {
            $this->get_all_events();
            return $this->_smarty->fetch(TEMPLATE."/html/calendar.html");
        }
    }

    /**
      \brief charge tout les evenements de la base
      \param void
      \return void
     */
    private function get_all_events() {
        $query = $this->_bdd->prepare("select * from EVENEMENT order by id DESC");
        $query->execute();

        $events = array();
        if ( $query->rowCount() > 0 ) {
            $i = 0;
            while ( $data = $query->fetch() ) {
                $events[$i] = $data;
                $events[$i]['contenu'] = Message::bbcode($data['contenu']);
                $i++;
            }
        }

        $this->_smarty->assign("Events", $events);
    }

    /**
    \brief charge un evenement en fonction de son Id
    \param id l'identifiant de l'evenement
    \return void
     */
    public function get_event($id) {
        $query = $this->_bdd->prepare("select * from EVENEMENT where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = array();
        if ( $query->rowCount() > 0 ) {
            $data = $query->fetch();
            $data['contenu'] = Message::bbcode($data['contenu']);
        }

        $coms = $this->get_data_coms($id); //on va chercher les coms de l'event chargé

        //on détermine si l'utilisateur peut poster des commentaires (connecté ou non ?)
        $user_connected = "false";
        if(isset($_SESSION['user_connected']) && $_SESSION['user_connected']) {
            $user_connected = "true";
        }

        $this->_smarty->assign("Event", $data);
        $this->_smarty->assign("Coms", $coms);
        $this->_smarty->assign("User_connected", $user_connected);
    }


    /**
     * @brief va chercher les events dans la base, et renvoie un tableau php avec le résultat
     * @return array liste des events
     */
    public function get_data_events() {
        $query = $this->_bdd->prepare("select * from EVENEMENT order by id DESC");
        $query->execute();

        $events = array();
        if ( $query->rowCount() > 0 ) {
            $i = 0;
            while ( $data = $query->fetch() ) {
                $events[$i] = $data;
                $events[$i]['contenu'] = Message::bbcode($data['contenu']);
                $i++;
            }
        }

        return $events;
    }

    /**
    \brief cherche les commentaire associe a un evenement en fonction de son id
    \param id l'identifiant de l'evenement
    \return un tableau de commentaire ou null si il n'y en as pas
     */
    public function get_data_coms($id) {
        $query = $this->_bdd->prepare("select * from EVENEMENT_COM where idEvenement = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        if ($query->rowCount() > 0 ) {
            $data = array();
            $i = 0;
            $profil = new Profil($this->_bdd);
            while ( $rep = $query->fetch() ) {
                $data[$i] = $rep;
                $data[$i]['contenu'] = Message::bbcode($rep['contenu']);
                $data[$i]['utilisateur'] = $profil->search_byId($rep['idUtilisateur'])['Pseudo'];
                $i++;
            }
            return $data;
        } else {
            return null;
        }
    }

    /**
     * @brief ajout un commentaire à un évènement
     * @return bool true si réussite sinon false
     */
    private function add_com_event() {
        if(isset($_POST['id_event']) && isset($_POST['message'])) {
            $date = date("Y-m-d H:i:s");
            $contenu = htmlentities($_POST['message']);
            $id_event = $_POST['id_event'];
            $user = $_SESSION['user']['Id'];
            $query = $this->_bdd->prepare("insert into EVENEMENT_COM values(null, :text, :date, :idevent, :iduser)");
            $query->bindParam(":text", $contenu);
            $query->bindParam(":date", $date);
            $query->bindParam(":idevent", $id_event);
            $query->bindParam(":iduser", $user);
            $query->execute();
            return $query->rowCount() == 1;
        } else {
            return false;
        }
    }
}






?>
