<?php

/* Vérification des arg de l'url : si une action est demandée on la traite */
if(isset($_GET['action'])) {
    $action = $_GET['action']; //on récupère l'action

    /* Si on veut ajouter un membre... */
    if($action == "ajouter") {

        //ON AJOUTE LA NEWS ICI DANS LA BDD ICI
        //function add_NEWS($bdd, $titre, $date, $contenu, $IdPhoto, $auteur){
        add_UTILISATEUR($bdd, $_POST['pseudo'], $_POST['mail'], $_POST['mdp'], 1, $_POST['type']);
        echo var_dump($_POST);
        //header("Location: index.php?page=new_article");

    } else if($action == "supprimer") { /* Sinon si on demande une suppression.. */
        if(isset($_GET['id'])) {
            echo "article a supprimer id =".$_GET['id'];
            /* ATTENDRE QUE LA PAGE AFFICHAGE DES ARTICLES SOIT CREE  */
            /* PUIS SUPPRIMER LE OU LES ARTICLES QUI ONT ETE COCHES */

        } else {
            echo "erreur, il manque l'id du membre à supprimer.<br>";
        }
    }

} else {
    include("html/membre.html");
}
?>