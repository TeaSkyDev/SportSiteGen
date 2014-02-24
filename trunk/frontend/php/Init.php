<?php

  /*
   =====================================================
   Classe qui selectionne le template et le nom du Site
   =====================================================
   */


class Init {
	
    private $_template; /* nom de template charge de la base */
    private $_name; /* nom du site */
    private $_bdd; /* base de donnees rattache */

    /**
     \brief construit l'objet
     \param bdd la base de donnees
     */
  public function __construct($bdd) {
    $this->_bdd = $bdd;

    $query = $this->_bdd->prepare("select Nom, current_template from SITE");
    $query->execute();
    if($query->rowCount() != 0) {
      $data = $query->fetch();
      $this->_template = $data['current_template'];
      $this->_name     = $data['Nom'];
    } else {
      echo "ERREUR PAS DE TEMPLATE DEFINI DANS LA BDD.<br>";
      $this->_template = NULL;
    }
  }
  
  /**
   \brief renvoi le nom de dossier de template
   \param void
   \return nom du dossier
   */
  public function get_template() {
    return $this->_template;
  }

  /**
   \brief renvoi le nom du site
   \param void
   \return nom du site
   */
  public function get_name() {
      return $this->_name;
  }

}

?>