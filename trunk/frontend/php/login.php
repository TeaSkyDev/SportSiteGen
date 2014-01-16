<?php
require_once("../mysql_connect.php");
/* On vérifie que des données ont été envoyées */
if(isset($_POST['pseudo']) && isset($_POST['password'])) {
	$pseudo = $_POST['pseudo'];
	$pass  = htmlentities($_POST['password']);

	/* On cherche un utilisateur avec le pseudo demandé */
	$requete  = $bdd->query("select * from UTILISATEUR where Pseudo = '".$pseudo."'");
	if($requete) {
		$res_pass = $requete->fetch();
	} else {
		$res_pass = null;
	}

	/* On vérifie que le mot de passe entré est le même que celui associé au pseudo dans la bdd */
	if(md5($pass) == $res_pass['Mdp'] && $res_pass['Mdp'] != null) {
		$_SESSION['connected'] = true;
		$_SESSION['user'] = $res_pass; //on garde en mémoire le résultat de la requete, cad les info du user
		echo 'Vous etes maintenant connecte.<br>';
		header("Location: index.php");
	} else {
		echo 'Pseudo &&/|| mot de passe incorrecte.<br><a href="index.php">Nouvelle tentative</a>';
	}
} else {
	include("html/connexion.html");
}
?>