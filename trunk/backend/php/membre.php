<?php
$profil=new Profil($bdd);

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "ajouter"){
    	if($_POST['pass'] == $_POST['pass_verif']) {
	    if($profil->insert($_POST['pseudo'], $_POST['mail'], $_POST['pass'], $_POST['photo'], $_POST['type'])){
		header("Location: index.php?page=membre"); 
	    } else {
		$msg = "Erreur lors de l'enregistrement de l'utilisateur.";
		header("Location: index.php?page=err&page_r=new_membre&msg=".$msg);
	    }
	} else {
	    $msg = "Erreur, les deux mots de passe ne sont pas identiques.";
	    header("Location: index.php?page=err&page_r=new_membre&msg=".$msg);
	}
    } else if ($action == "supprimer") {
	if(isset($_GET['id'])) {
	    if($profil->s_delete_byId($bdd, $_GET['id'])) {
		include("html/membre.html");
	    } else {
		$msg = "Erreur lors de la suppression";
		header("Location: index.php?page=err&page_r=membre&msg=".$msg);
	    }
	} else {
	    $msg = "Id non renseigne !";
	    header("Location: index.php?page=err&page_r=membre&msg=".$msg);
	}
    } else if ($action == "editer") {
	if($profil->update_membre($_GET['id'], $_POST['pseudo'], $_POST['mail'], $_POST['pass'], $_POST['photo'], $_POST['type'])){
	    header("Location: index.php?page=membre");
	} else {
	    $msg = "Erreur lors de la modification de l'utilisateur.";
            header("Location: index.php?page=err&page_r=membre&msg=".$msg);
	}
    }
} else {
    if($_GET['page'] == "edit_membre") {
	include("html/editmembre.html");
    } else if($_GET['page'] == "new_membre") {
	include("html/newmembre.html");
    } else {
	include("html/membre.html");
    }
}

?>