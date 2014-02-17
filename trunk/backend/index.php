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
			case 'article':
				include("php/article.php");
				break;
			case 'new_article':
				include("html/article.html");
				break;
            case 'suppr_article':
                include("php/suppr_article.php");
                break;
            case 'edit_article':
                include("html/editarticle.html");
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
            case 'edit_membre':
                include("html/editmembre.html");
                break;
            case 'err':
                include("php/err.php");
			default:
				include("html/accueil.html");
		}
	} else {
		include("html/accueil.html");
	}
}
?>