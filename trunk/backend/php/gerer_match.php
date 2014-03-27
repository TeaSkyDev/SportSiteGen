<?php
require("php/Match.php");

if(isset($_GET['action'])) {
    if($_GET['action'] == "ajouter") {
        if(isset($_POST['team1'])
            && isset($_POST['score1'])
            && isset($_POST['team2'])
            && isset($_POST['score2'])
            && isset($_POST['date'])
            && isset($_POST['heure'])
            && isset($_POST['lieu'])
            && isset($_POST['joue'])
            && isset($_POST['com'])) {
            $date = $_POST['date']." ".$_POST['heure'];
            if(Match::s_insert($bdd, $_POST['joue'], $_POST['team1'], $_POST['team2'], $_POST['score1'], $_POST['score2'], $date, $_POST['lieu'], $_POST['com'])) {
               header("Location: index.php?page=match");
            } else {
                $msg = "Erreur lors de l'ajout d'un match.";
                header("Location: index.php?page=err&page_r=new_match&msg=".$msg);
            }
        }
    } else if($_GET['action'] == "editer") {
        if(isset($_GET['id_match'])) {
            if(isset($_POST['team1'])
                && isset($_POST['score1'])
                && isset($_POST['team2'])
                && isset($_POST['score2'])
                && isset($_POST['date'])
                && isset($_POST['heure'])
                && isset($_POST['lieu'])
                && isset($_POST['joue'])
                && isset($_POST['com'])) {
                $date = $_POST['date']." ".$_POST['heure'];
                if(Match::s_update($bdd,$_GET['id_match'], $_POST['joue'], $_POST['team1'], $_POST['team2'], $_POST['score1'], $_POST['score2'], $date, $_POST['lieu'], $_POST['com'])) {
                    header("Location: index.php?page=match");
                } else {
                    $msg = "Erreur lors de l'ajout d'un match.";
                    header("Location: index.php?page=err&page_r=edit_match&msg=".$msg);
                }
            }
        }
    } else if($_GET['action'] == "supprimer") {
        if(isset($_GET['id_match'])) {
            $bdd->query("delete from MATCHS where Id = ".$_GET['id_match']);
            header("Location: index.php?page=match");
        } else {
	     $msg = "Erreur lors de la suppression d'un match.";
	     header("Location: index.php?page=err&page_r=match&page_r=edit_match&msg=".$msg);
	}
    } else {
        include("html/newmatch.html");
    }
} else {
    if($_GET['page'] == "new_match") {
        include("html/newmatch.html");
    } else if($_GET['page'] == "edit_match") {
        include("html/editmatch.html");
    } else {
        include("html/match.html");
    }
}
?>