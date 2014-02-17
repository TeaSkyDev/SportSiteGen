<?php

/**
 * Date: 15/01/14
 *
 * Script d'administration du cms
 *
 */

session_start();
require("../mysql_connect.php");
require("php/fonctions.php");

/* Si l'admin n'est pas connecté, on l'envoie sur la page de login */
if(!isset($_SESSION['admin_connected']) || !$_SESSION['admin_connected']) {
	if(isset($_GET['page'])) {
        if($_GET['page'] == "err") {
            include("php/err.php");
        }
    }
    $_SESSION['admin_connected'] = false;
	include("html/authen.html");
} else { /* Sinon on vérifie si il a demandé une page en particulier */
	if(isset($_GET['page']) || isset($_POST['page'])) {
		$page = $_REQUEST['page'];

		switch($page) {
			case 'new_article':
				include("php/newarticle.php");
				break;
			case 'article':
				include("html/article.html");
				break;
			case 'logout':
				include("php/logout.php");
				break;
            case 'membre':
                include("html/membre.html");
                break;
            case 'new_membre':
                include("html/newmembre.html");
                break;
			default:
				include("html/accueil.html");
		}
	} else {
		include("html/accueil.html");
	}
}
?>