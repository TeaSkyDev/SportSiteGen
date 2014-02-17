<?php

/**
 * Date: 15/01/14
 *
 * Script d'administration du cms
 *
 */

session_start();
require("../mysql_connect.php");
require_once("../mysql_connect.php"); //la variable $bdd vient d'ici
require("php/fonctions.php");
require_once("../tpl/libs/Smarty.class.php");
$smarty  = new Smarty();

/* Si l'admin n'est pas connecté, on l'envoie sur la page de login */
if(!isset($_SESSION['admin_connected']) || !$_SESSION['admin_connected']) {
	$_SESSION['admin_connected'] = false;
	include("html/authen.html");
} else { /* Sinon on vérifie si il a demandé une page en particulier */
	if(isset($_GET['page']) || isset($_POST['page'])) {
		$page = $_REQUEST['page'];
		include("html/header.html");
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
                include("php/membre.php");
                break;
            case 'new_membre':
                include("html/newmembre.html");
                break;
			default:
				include("html/accueil.html");
		}
	} else {
	    include("html/header.html");
	    include("html/accueil.html");
	}
	
}
?>