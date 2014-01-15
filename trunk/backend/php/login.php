<?php

session_start();
require_once("../../mysql_connect.php");

/* On vérifie que des données ont été envoyées */
if(isset($_POST['login']) && isset($_POST['password'])) {
	$login = $_POST['login'];
	$pass  = $_POST['password'];

	/* On cherche un utilisateur avec le pseudo demandé */
	$requete  = $bdd->query("select Mdp from UTILISATEUR where Pseudo = '".$login."'");
	$res_pass = $requete->fetch();

	/* On vérifie que le mot de passe entré est le même que celui associé au pseudo dans la bdd */
	if(md5($pass) == $res_pass[0]) {
		$_SESSION['admin_connected'] = true;
		echo 'Vous etes maintenant connecte.<br><a href="../index.php">Acceder a la page d\'administration</a>';
	} else {
		echo 'Pseudo &/|| mot de passe incorrecte.<br><a href="../index.php">Nouvelle tentative</a>';
	}
}
?>