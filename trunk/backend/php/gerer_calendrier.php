<?php


require("Calendrier.php");


if (isset($_GET['action'] )) {
    if ( $_GET['action'] == "ajouter" ) {
	if ( isset($_POST['titre']) && isset($_POST['date']) && isset($_POST['contenu']) && isset($_POST['location']) ) {
	    if ( Calendrier::s_insert($bdd, $_POST['titre'], $_POST['contenu'], $_POST['date'], $_POST['location'])) {
		header("Location: index.php?page=calendrier");
	    } else {
		$msg = "Probleme lors de l'ajout de l'evenement";
		header("Location: index.php?page=err&page_r=new_event&msg=".$msg);
	    } 
	} else {
	    $msg = "toutes les donnees ne sont pas presente";
	    header("Location: index.php?page=err&page_r=new_event&msg=".$msg);	    
	}
    } else if ( $_GET['action'] == "edit" && isset($_GET['id'])) {
	if (isset($_POST['titre']) && isset($_POST['date']) && isset($_POST['contenu']) && isset($_POST['location'])) {
	    if( Calendrier::s_delete_byId($bdd, $_GET['id']) ) {
		if ( Calendrier::s_insert($bdd, $_POST['titre'], $_POST['contenu'], $_POST['date'], $_POST['location'])) {
		    header("Location:index.php?page=calendrier");
		} else {
		    $msg = "probleme lors de la modification de l'evenement";
		    header("Location:index.php?page=err&page_r=edit_event&msg=".$msg);
		}
	    } else {
		$msg = "probleme lors de la modification de l'evenement";
		header("Location:index.php?page=err&page_r=edit_event&msg=".$msg);
	    }
	} else {
	    $msg = "Erreur toutes les donnees ne sont pas presentes";
	    header("Location : index.php?page=err&page_r=edit_event&msg=".$msg);
	}
    } else if ( $_GET['action'] == "supprimer" && isset($_GET['id'])) {
	if (Calendrier::s_delete_byId($bdd, $_GET['id'])) {
	    header("Location: index.php?page=calendrier");
	} else {
	    $msg = "Erreur lors de la suppression de l'evenement";
	    header("Location: index.php?page=err&page_r=calendrier&msg=".$msg);
	}
    }
} else {
    if ( $_GET['page'] == "edit_event") {
	include("html/editevent.html");
    } else if ( $_GET['page'] == "new_event") {
	include("html/newevent.html");
    } else {
	include("html/calendrier.html");
    }
}



?>