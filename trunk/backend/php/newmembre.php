<?php


$profil = new Profil($bdd);



if( isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['pass_verif']) ) {
    if($_POST['pass'] == $_POST['pass_verif']) {
	if($profil->insert($_POST['pseudo'], $_POST['mail'], $_POST['pass'],1,1)) {
	    header("Location: index.php?page=membre");
	} else {
	    $msg = "Erreur lors de l'enregistrement de l'utilisateur.";
	    header("Location: index.php?page=err&page_r=new_membre&msg=".$msg);
	}
    } else {
	$msg = "Erreur, les deux mots de passe ne sont pas identiques.";
	header("Location: index.php?page=err&page_r=new_membre&msg=".$msg);
    }
} else {
    include("php/membre.php");
}

?>