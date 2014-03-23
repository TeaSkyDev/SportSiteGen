<?php

require("Tournoi.php");

if ( isset($_GET['action'] )) {
    if ( $_GET['action'] == 'ajouter' ) {
	if ( isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['datedebut']) && isset($_POST['datefin']) && isset($_POST['nbequipe']) ) {
	    if ( Tournoi::s_insert($bdd, $_POST['nom'], $_POST['description'], $_POST['datedebut'], $_POST['datefin'], $_POST['nbequipe'] )) {
		header("Location: index.php?page=tournois");
	    } else {
		$msg = "Erreur lors de l'ajout du tournoi.";
		//		header("Location: index.php?page=err&msg=".$msg);
		echo var_dump($_POST);
	    }
	} else {
	    $msg = "Erreur toute les donnees ne sont pas remplie.";
	    header("Location: index.php?page=err&msg=".$msg);
	}
    }
 } else {
    if ( $_GET['page'] == "edit_tournois" ) {
	include("html/edittournoi.html");
    } else if ( $_GET['page'] == "new_tournois") {
	include("html/newtournois.html");
    } else {
	include("html/tournois.html");
    }
 }



?>