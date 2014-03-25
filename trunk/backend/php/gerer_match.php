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
            $date = date("Y-m-d H:i:s");
            if(Match::s_insert($bdd, $_POST['joue'], $_POST['team1'], $_POST['team2'], $_POST['score1'], $_POST['score2'], $date, $_POST['lieu'], $_POST['com'])) {
               header("Location: index.php?page=match");
            } else {
                $msg = "Erreur lors de l'ajout d'un match.";
                header("Location: index.php?page=err&msg=".$msg);
            }
        }
    } else if($_GET['action'] == "editer") {
        //if(isset($_GET['id_match']))
    } else if($_GET['action'] == "supprimer") {
        if(isset($_GET['id_match'])) {
            $bdd->query("delete from MATCHS where Id = ".$_GET['id_match']);
            header("Location: index.php?page=match");
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