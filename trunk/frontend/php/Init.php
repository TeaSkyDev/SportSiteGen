<?php

class Init {
	
  private $_template;
  private $_bdd;

  public function __construct($bdd) {
    $this->_bdd = $bdd;

    $query = $this->_bdd->query("select current_template from SITE");
    if($query->rowCount() != 0) {
      $this->_template = $query->fetch()['current_template'];
    } else {
      echo "ERREUR PAS DE TEMPLATE DEFINI DANS LA BDD.<br>";
      $this->_template = NULL;
    }
  }

  public function get_template() {
    return $this->_template;
  }

}

?>