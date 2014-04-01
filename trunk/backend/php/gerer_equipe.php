<?php

require("Equipe.php");


if(isset($_GET['action'])) {
    if($_GET['action'] == "ajouter") {
	if(isset($_POST['nom']) && isset($_POST['photo']) && isset($_POST['categorie']) && isset($_POST['description'])) {
	    if(Equipe::s_insert($bdd, $_POST['nom'], $_POST['photo'], $_POST['categorie'], $_POST['description'])) {
		header("Location: index.php?page=equipe");
	    } else {
		$msg = "Erreur lors de l'ajout d'une equipe.";
		header("Location: index.php?page=err&page_r=new_equipe&msg=".$msg);
	    }
	} else {
	    $msg = "Erreur, toutes les donnees ne sont pas presentes.";
	    header("Location: index.php?page=err&page_r=new_equipe&msg=".$msg);
	}
	
    } else if($_GET['action'] == "edit" && isset($_GET['id'])) {
	if(isset($_POST['nom']) && isset($_POST['photo']) && isset($_POST['categorie']) && isset($_POST['description'])) {
	    if(Equipe::s_update($bdd, $_GET['id'], $_POST['nom'], $_POST['photo'], $_POST['categorie'], $_POST['description'])) {
		header("Location: index.php?page=equipe");
		
	    } else {
		$msg = "Erreur lors de la modification d'une equipe";
		header("Location: index.php?page=err&page_r=equipe&msg=".$msg);
	    }
	} else {
	    $msg = "Erreur, toutes les donnees ne sont pas presentes.";
	    header("Location: index.php?page=err&page_r=edit_equipe&msg=".$msg);
	}
    } else if($_GET['action'] == "supprimer" && isset($_GET['id'])) {
        if(Equipe::s_delete_byId($bdd, $_GET['id'])) {
            header("Location: index.php?page=equipe");
        } else {
            $msg = "Erreur lors de la suppression de l'équipe.";
            header("Location: index.php?page=err&page_r=equipe&msg=".$msg);
        }
    }
 } else {
    //Si aucune action n'a été demandé on renvoie le formulaire de la page demandée
    if($_GET['page'] == "edit_equipe") {
        include("html/editequipe.html");
    } else if($_GET['page'] == "new_equipe") {
        include("html/newequipe.html");
    } else {
        include("html/equipe.html");
    }
 }

?>