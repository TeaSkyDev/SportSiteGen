<?php

require_once("php/Login.class.php");

/**
 * Classe permettant à l'utilisateur de se connecter
 */

class Connexion {

    private $_bdd;       //représente la connexion à la bdd
    private $_smarty;    //représente l'objet smarty (moteur de template)

    public function __construct($bdd, $smarty) {
        $this->_bdd       = $bdd;
        $this->_smarty    = $smarty;
    }

    /**
     * @brief Renvoie les éléments à afficher en fonction du status de la connexion (formulaire, message de réussite ou d'échec..)
     * @return mixed
     */
    public function get_contenu() {
        //objet permettant la connexion
        $l = new Login("", "utilisateur", $this->_bdd, true);
        $l->addChamp("Login", "Pseudo", "text");
        $l->addChamp("Mdp", "Mdp", "password", true);

        $l->login();

        //si des données ont été envoyées...
        if($l->connexion_ok()) {
            return Message::msg("Vous êtes connecté.", "home", $this->_smarty);
        } else if(!$l->donnees_envoyees()) {
            return $this->_smarty->fetch(TEMPLATE."/html/connexion.html");
        } else {
            return Message::msg("Erreur lors de la connexion.", "connexion", $this->_smarty);
        }
    }

}

?>