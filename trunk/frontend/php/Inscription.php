<?php

class Inscription {

    /*
     *  Si des données ont été envoyées (post), on tente de les insérer dans la bdd
     *  \param bdd : représente la connexion à la bdd
     *  \return : true si l'insertion s'est bien passée sinon false
     */
    public function insert($bdd) {
        if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_verif']) && isset($_POST['email'])) {
            if($_POST['password'] == $_POST['password_verif']) {
                if(!add_UTILISATEUR($bdd, $_POST['pseudo'], $_POST['email'], md5($_POST['password']), 1, 1)) {
                    return false;
                } else {
                    $_SESSION['connected']        = true;
                    $_SESSION['user']['Pseudo']   = $_POST['pseudo'];
                    $_SESSION['user']['password'] = md5($_POST['password']);
                    $_SESSION['user']['Mail']     = $_POST['email'];
                    $_SESSION['user']['IdPhoto']  = 1;
                    $_SESSION['user']['IdTypeUser'] = 1;
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