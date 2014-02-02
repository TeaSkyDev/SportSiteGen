<?php

/* Vérification des arg de l'url : si une action est demandée on la traite */
if(isset($_GET['action'])) {
    $action = $_GET['action']; //on récupère l'action

    /* Si on veut ajouter un news... */
    if($action == "ajouter") {

        //ON AJOUTE LA NEWS ICI DANS LA BDD ICI

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
