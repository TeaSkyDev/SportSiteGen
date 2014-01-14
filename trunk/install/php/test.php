<?php
	//session_start();
	require_once("../mysql_connect.php");

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$res = $bdd->query("select * from UTILISATEUR");
	//$res->setFetchMode(PDO::FETCH_OBJ); 
	if($res) {
		while($u = $res->fetch()) {
		echo $u['Pseudo'];
		}
	} else {
		echo 'erreur';
	}	
	$res->closeCursor();
?>