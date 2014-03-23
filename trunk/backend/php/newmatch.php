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
    } else {
        include("html/newmatch.html");
    }
} else {
    include("html/newmatch.html");
}
?>