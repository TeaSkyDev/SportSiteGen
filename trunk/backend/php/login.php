<?php

session_start();
require_once("../../mysql_connect.php");

/* On vérifie que des données ont été envoyées */
if(isset($_POST['login']) && isset($_POST['password'])) {
	$login = $_POST['login'];
	$pass  = htmlentities($_POST['password']);

	/* On cherche un utilisateur avec le pseudo demandé */
	$requete  = $bdd->query("select Mdp, IdTypeUser from UTILISATEUR where Pseudo = '".$login."'");
	if($requete) {
		$res_pass = $requete->fetch();
	} else {
		$res_pass = null;
	}

	/* On vérifie que le mot de passe entré est le même que celui associé au pseudo dans la bdd, puis son type (admin, ...) */
	if(md5($pass) == $res_pass[0] && $res_pass != null) {
		$requete_droit = $bdd->query("select Nom from TYPE_USER where id = ".$res_pass['IdTypeUser']);
		if($requete_droit) {
			$res_type = $requete_droit->fetch();
		} else {
			$res_type = null;
		}
		if($res_type[0] == "Administrateur") {
			$_SESSION['admin_connected'] = true;
			//echo 'Vous etes maintenant connecte.<br><a href="../index.php">Acceder a la page d\'administration</a>';
			header("Location: ../html/ok.html");
		} else {
            header("Location: ../frontend/index.php?page=err&msg=Page reservee aux administrateurs.");
		}
	} else {
        $msg = urlencode('Pseudo &&/|| mot de passe incorrecte.');
	    header("Location: ../index.php?page=err&msg=".$msg);
    }
}
?>