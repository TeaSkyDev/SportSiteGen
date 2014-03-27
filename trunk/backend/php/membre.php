<?php

if(isset($_GET['id'])) {
    if(Profil::s_delete_byId($bdd, $_GET['id'])) {
        include("html/membre.html");
    } else {
        $msg = "Erreur lors de la suppression";
	header("Location: index.php?page=err&page_r=membre&msg=".$msg);
    }
} else {
    $msg = "Id non renseigne !";
    header("Location: index.php?page=err&page_r=membre&msg=".$msg);
}

?>