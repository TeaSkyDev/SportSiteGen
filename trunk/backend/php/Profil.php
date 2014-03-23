<?php

class Profil {

    private $_bdd;
    private $_data;
    private $_nb;

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


    public function get_content() {
        return $this->_data;
    }


    public function exist($name) {
        $query = $this->_bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        return $query->rowCount() == 0;
    }

    public function insert($name, $mail, $pass, $photo, $type) {
        $query = $this->_bdd->prepare("insert into UTILISATEUR values(null, :name, :mail, :pass, :photo, :type)");
        $query->bindParam(":name", $name);
        $query->bindParam(":mail", $mail);
        $query->bindParam(":pass", md5($pass));
        $query->bindParam(":photo", $photo);
        $query->bindParam(":type", $type);
        $query->execute();
        return $query->rowCount() == 0;
    }

    public static function s_delete_byName($name) {
        $query = $this->_bdd->prepare("delete from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        return $query->rowCount() == 1;
    }


    public static function s_delete_byId($bdd, $id) {
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $bdd->prepare("delete from UTILISATEUR where Id = :id");
        $query->bindParam(":id", $id);
        return $query->execute();
        //return $query->rowCount() == 1;
    }


    public function search_byName($name) {
        $query = $this->_bdd->prepare("select * from UTILISATEUR where Pseudo = :name");
        $query->bindParam(":name", $name);
        $query->execute();
        if( $query->rowCount() != 0) {
            return $query->fetch();
        } else {
            return false;
        }
    }


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




}



?>
