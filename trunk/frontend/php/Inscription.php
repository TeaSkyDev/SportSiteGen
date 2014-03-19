<?php

//require("Profil.php");



  /*
   ======================================================
   Classe qui inscrit un nouvel utilisateur dans la base
   ======================================================
   */

class Inscription {

    /*
     *  \brief Si des données ont été envoyées (post), on tente de les insérer dans la bdd
     *  \param bdd : représente la connexion à la bdd
     *  \return : true si l'insertion s'est bien passée sinon false
     */
    public static function insert($bdd) {
        if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_verif']) && isset($_POST['email'])) {
            if($_POST['password'] == $_POST['password_verif']) {
                if(!Profil::s_insert($bdd, $_POST['pseudo'], $_POST['email'], $_POST['password'], 1, 2)) {
                    return false;
                } else {
                    $data = Profil::s_search_byName($bdd, $_POST['pseudo']);
                    $_SESSION['connected'] = true;
                    $_SESSION['user']      = $data;
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>