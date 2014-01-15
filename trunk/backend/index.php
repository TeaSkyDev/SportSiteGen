<?php

/**
 * Date: 15/01/14
 *
 * Script d'administration du cms
 *
 */

session_start();
/* Si l'admin n'est pas connecté, on l'envoie sur la page de login */
if(!isset($_SESSION['admin_connected']) || !$_SESSION['admin_connected']) {
	$_SESSION['admin_connected'] = false;
	include("authen.html");
} else { /* Sinon on vérifie si il a demandé une page en particulier */
	if(isset($_GET['page']) || isset($_POST['page'])) {
		$page = $_REQUEST['page'];

		switch($page) {
			case 'new_article':
				include("newarticle.html");
				break;
			case 'deconnexion':
				include("deconnexion.php");
				break;
			default:
				include("accueil.html");
		}
	} else {
		include("accueil.html");
	}
}


?>