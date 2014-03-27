<?php

require("Tournoi.php");

if ( isset($_GET['action'] )) {
    if ( $_GET['action'] == 'ajouter' ) {
	if ( isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['datedebut']) && isset($_POST['datefin']) && isset($_POST['nbequipe']) ) {
	    $date_debut = strtotime($_POST['datedebut']);
	    $date_fin   = strtotime($_POST['datefin']);
	    if($date_fin >= $date_debut) {
		if(gettype($_POST['nbequipe']) == "integer") {
		    if ( log($_POST['nbequipe'], 2)*10%10 == 0 ) {
			if ( Tournoi::s_insert($bdd, $_POST['nom'], $_POST['description'], $_POST['datedebut'], $_POST['datefin'], $_POST['nbequipe'] )) {
			    header("Location: index.php?page=tournois");
			} else {
			    $msg = "Erreur lors de l'ajout du tournoi.";
			    header("Location: index.php?page=err&page_r=new_tournois&msg=".$msg);
			}
		    } else {
			$msg = "Vous ne pouvez pas faire un tournoi avec ".$_POST['nbequipe']." equipes (! log2(".$_POST['nbequipe'].")) impossible";
			header("Location: index.php?page=err&msg=".$msg);
		    }
		} else {
		    $msg = "Le nombre d'equipe doit etre un entier !";
		    header("Location: index.php?page=err&page_r=new_tournois&msg=".$msg);
		}
	    } else {
		$msg = "Dates incorrectes !";
		header("Location: index.php?page=err&page_r=new_tournois&msg=".$msg);
	    }
	} else {
	    	$msg = "Erreur toute les donnees ne sont pas remplie.";
		header("Location: index.php?page=err&page_r=new_tournois&msg=".$msg);
	}
    } else if ( $_GET['action'] == 'ajouter_match') {
	if ( isset($_GET['id']) && isset($_GET['id'])) {
	    if ( isset($_POST['team1'])
		 && isset($_POST['team2'])
		 && isset($_POST['score1'])
		 && isset($_POST['team2'])
		 && isset($_POST['score2'])
		 && isset($_POST['date'])
		 && isset($_POST['heure'])
		 && isset($_POST['lieu'])
		 && isset($_POST['joue'])
		 && isset($_POST['com'])) {
	
		$date = $_POST['date']." ".$_POST['heure'];
		if ( Match::s_insert($bdd, $_POST['joue'], $_POST['team1'], $_POST['team2'], $_POST['score1'], $_POST['score2'], $date, $_POST['lieu'], $_POST['com'])) {
		    $id = $bdd->lastInsertId();
		    if ( Tournoi::s_add_match_byTouId($bdd, $_GET['id'], $id, $_GET['tour'])) {
			header("Location: index.php?page=edit_tournois&id=".$_GET['id']);
		    } else {
			$msg = "Erreur lors de l'inscription au tournoi";
			header("Location:index.php?page=err&msg=".$msg);
		    }
		} else {
		    echo $id;
		    /*$msg = "Erreur lors de l'ajout du match";
		      header("Location: index.php?page=err&msg=".$msg);*/
		}
	    } else {
		/*		$msg = "Erreur toute les données ne sont pas presente";
				header("Location:index.php?page=err&msg=".$msg);*/
	    }
	}
    } else if ( $_GET['action'] == "supprimer_match" ) {
	if ( isset($_GET['id_match']) ) {
	    $bdd->query("delete from MATCHS where Id=".$_GET['id_match']);
	    $bdd->query("delete from APPARTENIR_TOURNOI where IdMATCHS=".$_GET['id_match']);
	    header("Location:index.php?page=edit_tournois&id=".$_GET['id']);
	}
    } else if ( $_GET['action'] == "editer_match") {
	header("Location:index.php?page=edit_match&id_match=".$_GET['id_match']);
    } else if ( $_GET['action'] == "supprimer") {
	if ( isset($_GET['id']) ) {
	    if ( Tournoi::s_delete_byId($bdd, $_GET['id'] )) {
		header("Location: index.php?page=tournois");
	    } else {
		$msg = "Erreur lors de la suppression du tournoi";
		header("Location: index.php?page=err&msg=".$msg);
	    }
	} else {
	    $msg = "Erreur lors de la suppression du tournoi";
	    header("Location: index.php?page=err&msg=".$msg);
	}
    }
 } else {
    if ( $_GET['page'] == "edit_tournois" ) {
	include("html/edittournoi.html");
    } else if ( $_GET['page'] == "new_tournois") {
	include("html/newtournois.html");
    } else if ($_GET['page'] == "new_tourn_match") {
	include("html/newtourmatch.html");
    } else {
	include("html/tournois.html");
    } 
 }



?>