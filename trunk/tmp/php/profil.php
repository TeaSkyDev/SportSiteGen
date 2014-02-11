<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 18/01/14
 * Time: 12:00
 */

if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
	    if(!isset($_POST['action']) && !isset($_GET['action'])) {
		    $profil = $_SESSION['user'];
		    $profil['modif'] = "false";
		    $profil['img'] = get_PHOTO_byId($bdd, $profil['IdPhoto'])['Fichier'];
		    $profil['statu'] = get_TYPE_USER_byId($bdd, $profil['IdTypeUser'])['Nom'];
		    if($profil) {
		        $smarty->assign("Profil", $profil);
		        $smarty->display("html/profil.html");
		    } else {
		        header("Location: index.php?page=erreur&msg=Erreur recuperation du profil");
		    }
		} else {
			$action = $_REQUEST['action'];
			if($action == "modif_Pseudo" && isset($_POST['new_Pseudo'])) {
				if(Update_TABLE_byCol($bdd, "UTILISATEUR", $_SESSION['user']['Id'], 1, $_POST['new_Pseudo'])) {
					$_SESSION['user']['Pseudo'] = $_POST['new_Pseudo'];
					header("Location: index.php?page=profil");
				} else {
					echo "Erreur<br>";
				}
			} else if($action == "modif_Mail" && isset($_POST['new_Mail'])) {
				if(Update_TABLE_byCol($bdd, "UTILISATEUR", $_SESSION['user']['Id'], 2, $_POST['new_Mail'])) {
					$_SESSION['user']['Mail'] = $_POST['new_Mail'];
					header("Location: index.php?page=profil");
				} else {
					echo "Erreur<br>";
				}
			} else if($action == "modif_Pseudo") {
				$profil['modif'] = "true";
				$profil['champ'] = "Pseudo";
				$smarty->assign("Profil", $profil);
				$smarty->display("html/profil.html");
			} else if($action == "modif_Mail") {
				$profil['modif'] = "true";
				$profil['champ'] = "Mail";
				$smarty->assign("Profil", $profil);
				$smarty->display("html/profil.html");
			} else {
				echo "hein quoi ??";
			}
		}
}