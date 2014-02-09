<?php
	require_once("fonctions.php");
	if(isset($_GET['login']) && isset($_GET['pass']) && isset($_GET['bd']) && isset($_GET['server'])) {
		$bdd = bdd_connexion($_GET['server'], $_GET['login'], $_GET['pass'], $_GET['bd']);
		exec_sql_file($bdd, "../sql/Suppression.sql");
		echo '<h1 align="center">DONE</h1>';
	}
?>