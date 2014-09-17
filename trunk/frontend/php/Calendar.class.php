<?php

  /*
   ============================================================
   Class qui cherche les evenement dans la base de donnees
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

    public function get_content() {
        $this->get_all_event();
        return $this->_smarty->fetch(TEMPLATE."/html/calendar.html");
    }

    /**
      \brief charge tout les evenements de la base
      \param void
      \return void
     */
    private function get_all_event() {
        $query = $this->_bdd->prepare("select * from EVENEMENT order by id DESC");
        $query->execute();

        $events = array();
        if ( $query->rowCount() > 0 ) {
            $i = 0;
            while ( $data = $query->fetch() ) {
                $events[$i] = $data;
                $i++;
            }
        }

        $this->_smarty->assign("Events", $events);
    }

    /**
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
                $i++;
            }
        }

        return $events;
    }
    
}






?>
