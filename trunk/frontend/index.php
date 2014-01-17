<?php
/**
 * Date: 15/01/14
 *
 * Script d'administration du cms
 *
 */
session_start();

require_once("../tpl/libs/Smarty.class.php");
require("../mysql_connect.php");
include("fonctions.php");
$smarty  = new Smarty();

/* On affiche le header */
include("php/header.php");


if(isset($_GET['page']) || isset($_POST['page'])) {
	$page = $_REQUEST['page'];

	switch($page) {
		case 'connexion':
			include("php/login.php");
			break;
		case 'deconnexion':
			include("php/logout.php");
			break;
		case 'inscription':
			if(isset($_GET['traitement']) && $_GET['traitement'] == "true") {
				include("php/inscription.php");
			} else {
				include("html/inscription.html");
			}
			break;
		case 'about':
			include("html/about.html");
			break;
		case 'calendrier':
			include("php/calendrier.php");
			break;
		case 'equipe':
			include("html/equipe.html");
			break;
		case 'fiche_joueur':
			include("html/fiche_joueur.html");
			break;
		case 'membre_equipe':
			include("html/membre_equipe.html");
			break;
		case 'news':
			include("php/news.php");
			break;
		case 'news_simple':
			include("html/news_simple.html");
			break;
		case 'new_commentaire':
			include("php/new_commentaire.php");
			break;
		default:
			include("php/accueil.php");
	}
} else {
	include("php/accueil.php");
}



?>