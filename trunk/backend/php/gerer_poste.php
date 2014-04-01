<?php

require("php/Poste.php");
require("php/Joueur.php");

if (isset($_GET['action']) ) {
    if ( $_GET['action'] == "ajouter") {
	if (isset($_POST['nom']) 
	    && isset($_POST['desc'])) {
	    if ( Poste::s_insert($bdd, $_POST['nom'], $_POST['desc'])) {
		header("Location:index.php?page=equipe");
	    } else {
		$msg = "Erreur lors de l'ajout d'un joueur";
		header("Location:index.php?page=err&msg=".$msg);
	    }
	} else {
	    $msg = "Erreur il manque des informations";
	    header("Location:index.php?page=err&page_r=equipe&msg=".$msg);
	}	    
    } else if ( $_GET['action'] == "supprimer" ) {
	if ( isset( $_GET['id'] ) ) {
	    if (Poste::s_delete_byId($bdd, $_GET['id']) ) {
		Joueur::s_delete_byPosteId($bdd, $_GET['id']);
		header("Location: index.php?page=equipe");
	    }	    
	} else {
	    $msg = "Erreur l'identifiant est manquant";
	    header("Location: index.php?page=err&page_r=equipe&msg=".$msg);
	}
    } else if ( $_GET['action'] == "edit" ) {
	if (isset($_GET['id'] ) &&
	    isset($_POST['nom']) && 
	    isset($_POST['desc'])) {
	    if ( Poste::s_update($bdd, $_GET['id'], $_POST['nom'], $_POST['desc'])) {
		header("Location: index.php?page=equipe");
	    } else {
		$msg = "Erreur lors de la mise a jour du poste";
		header("Location: index.php?page=err&page_r=equipe&msg=".$msg);
	    }
	} else {
	    $msg = "Erreur il manque des informations";
	    header("Location: index.php?page=err&page_r=equipe&msg=".$msg);
	}
    }
} else {
    if ( $_GET['page'] == "new_poste" ) {
	include("html/newposte.html");
    } else if ($_GET['page'] == "edit_poste") {
	include("html/editposte.html");
    } else {
	include("html/poste.html");
    }
}


?>