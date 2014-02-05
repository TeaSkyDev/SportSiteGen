<?php
	require_once("fonctions.php");
	if(isset($_GET['login']) && isset($_GET['pass'])) {
		$bdd = bdd_connexion('info2', $_GET['login'], $_GET['pass'], 'DB'.$_GET['login']);
		exec_sql_file($bdd, "../sql/Suppression.sql");
		echo '<h1 align="center">DONE</h1>';
	}
?>