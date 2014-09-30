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
            $query_right = $this->_bdd->query("SELECT Nom FROM type_utilisateur WHERE id = ".$_SESSION['admin']['IdTypeUser']);
            if($query_right) {
                $res_type = $query_right->fetch();
            } else {
                $res_type = null;
            }

            //c'est bien un administrateur
            if($res_type[0] == "Administrateur") {
                $_SESSION['admin_connected'] = true;
                header("Location: index.php");
            } else {
                unset($_SESSION);
                unset($_POST);
                return Message::msg("Page reservee aux administrateurs.", "connexion", $this->_smarty);
            }
        } else if(!$l->donnees_envoyees()) {
            return $this->_smarty->fetch("html/connexion.html");
        } else {
            return Message::msg("Erreur lors de la connexion.", "connexion", $this->_smarty);
        }
    }

}

?>