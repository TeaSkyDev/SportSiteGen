<?php
include("News.php");

/* Vérification des arg de l'url : si une action est demandée on la traite */
if(isset($_GET['action'])) {
    $action = $_GET['action']; //on récupère l'action

    /* Si on veut ajouter un news... */
    if($action == "ajouter") {
        if(add_NEWS($bdd, $_POST['titre'], date("Y-m-d H:i:s"), $_POST['editor1'], 1, "Admin")) {
            header("Location: index.php?page=article");    
        } else {
            $msg = "Erreur lors de l'ajout d'une news.";
            header("Location: index.php?page=err&msg=".$msg);
        }
    } else if($action == "supprimer") { /* Sinon si on demande une suppression.. */
        if(isset($_GET['id'])) {
            if(Delete_byID($bdd, "NEWS", $_GET['id'])) {
                header("Location: index.php?page=article");
            } else {
                $msg = "Erreur lors de la suppression.";
                header("Location: index.php?page=err&msg=".$msg);
            }
        } else {
            $msg = "Erreur, il manque l'id de la news à supprimer.<br>";
            header("Location: index.php?page=err&msg=".$msg);
        }
    } else if ($action == "edit") {
	$new = new News($bdd);
	if ($new->update_news($_GET['id'], $_POST['titre'], date("y-m-d H:i:s"), $_POST['editor1'], 1, "Admin")) {
	    header("Location: index.php?page=article");
	} else {
	    $msg = "Erreur lors de la mise a jour d'une news.";
            header("Location: index.php?page=err&msg=".$msg);
	}
    }

} else {
    include("html/article.html");
}
?>
