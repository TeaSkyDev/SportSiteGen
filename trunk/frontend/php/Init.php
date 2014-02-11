<?php

class Init {
	
  private $_template;
  private $_name;
  private $_bdd;

  public function __construct($bdd) {
    $this->_bdd = $bdd;

    $query = $this->_bdd->query("select Nom, current_template from SITE");
    if($query->rowCount() != 0) {
      $data = $query->fetch();
      $this->_template = $data['current_template'];
      $this->_name     = $data['Nom'];
    } else {
      echo "ERREUR PAS DE TEMPLATE DEFINI DANS LA BDD.<br>";
      $this->_template = NULL;
    }
  }

  public function get_template() {
    return $this->_template;
  }

  public function get_name() {
      return $this->_name;
  }

}

?>