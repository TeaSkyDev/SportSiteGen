<?php
/**
 * Date: 15/01/14
 *
 * Script d'administration du cms
 *
 */
session_start();
if(isset($_GET['page']) || isset($_POST['page'])) {
	$page = $_REQUEST['page'];

	switch($page) {
		case 'login':
			include("html/login.html");
			break;
		case 'logout':
			include("php/logout.php");
			break;
		case 'inscription':
			include("html/inscription.html");
			break;
		default:
			include("php/accueil.php");
	}
} else {
	include("php/accueil.php");
}

?>