<?php


/*
 ====================================================
 Classe qui gere les Utilisateurs
 ====================================================
 */

class Profil {

    private $_bdd; /* la base de donnees */
    private $_data; /* les utilisateurs */
    private $_nb; /* le nombre d'utilisateur */

    /**
    \brief construit l'objet
    \param bdd la base de donnees
     */
    public function __construct($bdd) {
        $this->_bdd = $bdd;
        $query = $bdd->prepare("select * from UTILISATEUR ORDER BY Id desc");
        $query->execute();
        $this->_nb = 0;
        if( $query->rowCount() > 0) {
            while ($d = $query->fetch() ) {
                $this->_data[$this->_nb] = $d;
                $this->_nb++;
            }
        }
    }

    /**
    \brief renvoi les utilisateur charge
    \param void
    \return un tableau d'utilisateur
     */
    public function get_content() {
        return $this->_data;
    }

    /**
    \brief cherche si un utilisateur existe
    \param name le nom de l'utilisateur
    \return vrai si il existe faux sinon
     */
    public function exist($name) {
        $query = $this->_bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        return $query->rowCount() == 0;
    }

    /**
    \brief cherche si un utilisateur existe ( fonction statique )
    \param bdd la base de donnees
    \param name le nom de l'utilisateur
    \return vrai si il existe faux sinon
     */
    public static function  s_exist($bdd, $name) {
        $query = $bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        return $query->rowCount() == 0;
    }

    /**
    \brief insere un nouvel utilisateur dans la base
    \param name le nom de l'utilisateur
    \param mail le mail de l'utilisateur
    \param pass le mdp de l'utilisateur
    \param photo l'identifiant de la photo
    \param type l'identifiant du type d'utilisateur
    \return vrai si reussi faux sinon
     */
    public function insert($name, $mail, $pass, $photo, $type) {
        $query = $this->_bdd->prepare("insert into UTILISATEUR values(null, :name, :mail, :pass, :photo, :type)");
        $query->bindParam(":name", $name);
        $query->bindParam(":mail", $mail);
        $query->bindParam(":pass", md5($pass));
        $query->bindParam(":photo", $photo);
        $query->bindParam(":type", $type);
        $query->execute();
        return $query->rowCount() == 1;
    }


    /**
    \brief insere un nouvel utilisateur dans la base ( fonction statique )
    \param bdd la base de donne
    \param name le nom de l'utilisateur
    \param mail le mail de l'utilisateur
    \param pass le mdp de l'utilisateur
    \param photo l'identifiant de la photo
    \param type l'identifiant du type d'utilisateur
    \return vrai si reussi faux sinon
     */
    public static function s_insert($bdd, $name, $mail, $pass, $photo, $type) {
        $query = $bdd->prepare("insert into UTILISATEUR values(null, :name, :mail, :pass, :photo, :type)");
        $query->bindParam(":name", $name);
        $query->bindParam(":mail", $mail);
        $query->bindParam(":pass", md5($pass));
        $query->bindParam(":photo", $photo);
        $query->bindParam(":type", $type);
        $query->execute();
        return $query->rowCount() == 1;
    }

    /**
    \brief supprime un utilisateur en fonction de son nom
    \param name le nom de l'utilisateur
    \return vrai si reussi faux sinon
     */
    public function delete_byName($name) {
        $query = $this->_bdd->prepare("delete * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        return $query->rowCount() == 1;
    }

    /**
    \brief supprime un utilisateur en fonction de son nom ( fonction statique )
    \param bdd la base de donnees
    \param name le nom de l'utilisateur
    \return vrai si reussi faux sinon
     */
    public static function s_delete_byName($bdd, $name) {
        $query = $bdd->prepare("delete * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        return $query->rowCount() == 1;
    }


    /**
    \brief supprime un utilisateur en fonction de son id
    \param id l'identifiant de l'utilisateur
    \return vrai si reussi faux sinon
     */
    public function delete_byId($id) {
        $query = $this->_bdd->prepare("delete * from UTILISATEUR where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->rowCount() == 1;
    }

    /**
    \brief supprime un utilisateur en fonction de son id ( fonction statique )
    \param bdd la base de donnees
    \param id l'identifiant de l'utilisateur
    \return vrai si reussi faux sinon
     */
    public static function s_delete_byId($bdd, $id) {
        $query = $bdd->prepare("delete * from UTILISATEUR where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->rowCount() == 1;
    }


    /**
    \brief cherche un utilisateur en fonction de son nom
    \param name le nom de l'utilisateur
    \return un utilisateur ou false
     */
    public function search_byName($name) {
        $query = $this->_bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        if($query->rowCount() != 0) {
            return $query->fetch();
        } else {
            return false;
        }
    }

    /**
    \brief cherche un utilisateur en fonction de son nom ( fonction statique )
    \param bdd la base de donne
    \param name le nom de l'utilisateur
    \return un utilisateur ou false
     */
    public static function s_search_byName($bdd, $name) {
        $query = $bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        if($query->rowCount() != 0) {
            return $query->fetch();
        } else {
            return false;
        }

    }

    /**
    \brief cherche un utilisateur e fonction de son id
    \param id l'identifiant de l'utilisateur
    \return un utilisateur ou false
     */
    public function search_byId($id) {
        $query = $this->_bdd->prepare("select * from UTILISATEUR where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        if ($query->rowCount() != 0) {
            return $query->fetch();
        } else {
            return false;
        }
    }

    /**
    \brief cherche un utilisateur en fonction de son id ( fonction statique )
    \param bdd la base de donnees
    \param id l'identifiant de l'utilisateur
    \return un utilisateur ou false
     */
    public static function s_search_byId($bdd, $id) {
        $query = $bdd->prepare("select * from UTILISATEUR where Id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        if ($query->rowCount() != 0) {
            return $query->fetch();
        } else {
            return false;
        }
    }

    /**
     * \brief permet de modifier un champs de la base de donnée
     * \param $bdd
     * \param $champs
     * \param $val
     */
    public static function s_set_profilById($bdd, $champs, $val, $id) {
        $query = $bdd->prepare("update UTILISATEUR set ".$champs." = :val where Id = :id");
        return $query->execute(array(':val' => $val, ':id' => $id));
    }

}



?>
