<?php

/* Vérification des arg de l'url : si une action est demandée on la traite */
if(isset($_GET['action'])) {
    $action = $_GET['action']; //on récupère l'action

    /* Si on veut ajouter un news... */
    if($action == "ajouter") {

        //ON AJOUTE LA NEWS ICI DANS LA BDD ICI
        //function add_NEWS($bdd, $titre, $date, $contenu, $IdPhoto, $auteur){
        add_NEWS($bdd, $_POST['titre'], date("Y-m-d H:i:s"), $_POST['editor1'], 1, "Admin");
        echo var_dump($_POST);
        //header("Location: index.php?page=new_article");

    } else if($action == "supprimer") { /* Sinon si on demande une suppression.. */
        if(isset($_GET['id_news'])) {

            /* ATTENDRE QUE LA PAGE AFFICHAGE DES ARTICLES SOIT CREE  */
            /* PUIS SUPPRIMER LE OU LES ARTICLES QUI ONT ETE COCHES */

        } else {
            echo "erreur, il manque l'id de la news à supprimer.<br>";
        }
    }

} else {
    include("html/newarticle.html");
}
