<?php

/*
 * Classe permettant de gérer les saisons
 *
 */

class Saison {
    static public function s_insert($bdd, $saison) {
        $query = $bdd->prepare("insert into SAISONS values(null, :saison)");
        $query->execute(array(":saison" => $saison));
        return $query->rowCount() == 1;
    }
    static public function s_delete($bdd, $id) {
        $query = $bdd->prepare("delete from SAISONS where Id = :id");
        $query->execute(array(":id" => $id));
        return $query->rowCount() == 1;
    }
}

?>