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
require_once("php/Profil.php");
$smarty  = new Smarty();

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
		include("html/header.html");
		switch($page) {
			case 'new_article':
				include("php/newarticle.php");
				break;
            case 'suppr_article':
                include("php/suppr_article.php");
                break;
			case 'article':
				include("php/article.php");
				break;
			case 'logout':
				include("php/logout.php");
				break;
            case 'membre':
                include("php/membre.php");
                break;
            case 'new_membre':
		if( isset($_GET['action']) ) {
		    include("php/newmembre.php");
		} else {
		    include("html/newmembre.html");
		} break;
            case 'err':
                include("php/err.php");
			default:
				include("html/accueil.html");
		}
	} else {
	    include("html/header.html");
	    include("html/accueil.html");
	}
	
}
?>