<?php
require("Saison.php");

if(isset($_GET['action'])) {
    if($_GET['action'] == "ajouter") {
        if(isset($_POST['new_saison'])) {
            if(Saison::s_insert($bdd, $_POST['new_saison'])) {
                header("Location: index.php?page=match");
            } else {
                $msg = "Erreur lors de l'ajout d'une saison.";
                header("Location: index.php?page=err&page_r=match&msg=".$msg);
            }
        } else {
            $msg = "Erreur lors de l'ajout d'une saison. (champs vide ?)";
            header("Location: index.php?page=err&page_r=match&msg=".$msg);
        }
    } else if($_GET['action'] == "supprimer" && isset($_GET['id_saison'])) {
        if(Saison::s_delete($bdd, $_GET['id_saison'])) {
            header("Location: index.php?page=match");
        } else {
            $msg = "Erreur lors de la suppression d'une saison";
            header("Location: index.php?page=err&page_r=match&msg=".$msg);
        }
    } else {
        $msg = "Erreur.";
        header("Location: index.php?page=err&page_r=match&msg=".$msg);
    }
}
?>