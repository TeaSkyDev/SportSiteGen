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
require("php/Profil.php");

/* Si l'admin n'est pas connecté, on l'envoie sur la page de login */
if(!isset($_SESSION['admin_connected']) || !$_SESSION['admin_connected']) {
    if(isset($_GET['page'])) {
        if($_GET['page'] == "err") {
            include("php/info.php");
        }
    }
    $_SESSION['admin_connected'] = false;
    include("html/authen.html");
} else { /* Sinon on vérifie si il a demandé une page en particulier */
    if(isset($_GET['page']) || isset($_POST['page'])) {
        $page = $_REQUEST['page'];

        switch($page) {
            /*ARTICLE*/
	case 'article':
	    include("php/article.php");
	    break;
	case 'new_article':
	    include("html/newarticle.html");
	    break;
	case 'edit_article':
	    include("html/editarticle.html");
	    break;
            /*CALENDRIER*/
	case 'calendrier':
	    include("php/gerer_calendrier.php");
	    break;
	case 'new_event':
	    include("php/gerer_calendrier.php");
	    break;
	case 'edit_event':
	    include("php/gerer_calendrier.php");
	    break;
            /*MEMBRE*/
	case 'membre':
	    include("html/membre.html");
	    break;
	case 'new_membre':
	    include("html/newmembre.html");
	    break;
	case 'edit_membre':
	    include("html/editmembre.html");
	    break;
	case 'suppr_membre':
	    include("php/membre.php");
	    break;
            /*EQUIPE*/
	case 'equipe':
	    include("html/equipe.html");
	    break;
	case 'new_equipe':
	    include("php/gerer_equipe.php");
	    break;
	case 'edit_equipe':
	    include("php/gerer_equipe.php");
	    break;
	case 'suppr_equipe':
	    include("php/gerer_equipe.php");
	    break;
            /*CATEGORIE*/
	case 'new_categorie':
	    include("php/gerer_categorie.php");
	    break;
	case 'edit_categorie':
	    include("php/gerer_categorie.php");
	    break;
	case 'suppr_categorie':
	    include("php/gerer_categorie.php");
	    break;
	    /*POSTE*/
	case 'new_poste':
	    include("php/gerer_poste.php");
	    break;
	case 'edit_poste':
	    include("php/gerer_poste.php");
	    break;
	case 'suppr_poste':
	    include("php/gerer_poste.php");
	    break;
	    /*JOUEUR*/
	case 'new_joueur':
	    include("php/gerer_joueur.php");
	    break;
	case 'edit_joueur':
	    include("php/gerer_joueur.php");
	    break;
	case 'suppr_joueur':
	    include("php/gerer_joueur.php");
	    break;
            /*MATCH*/
	case 'match':
	    include("html/match.html");
	    break;
	case 'new_match':
	case 'edit_match':
	case 'suppr_match':
	    include("php/gerer_match.php");
	    break;
            /*TOURNOIS*/
	case 'tournois':
	    include("php/gerer_tournois.php");
	    break;
	case 'new_tournois':
	    include("php/gerer_tournois.php");
	    break;
	case 'edit_tournois':
	    include("php/gerer_tournois.php");
	    break;
	case 'new_tourn_match':
	    include("php/gerer_tournois.php");
	    break;
            /* PHOTOS */
	case 'photos':
	    include("html/photos.html");
	    break;
	case 'photos_matchs':
	    include("html/photos_matchs.html");
	    break;
	case 'photos_tournois':
	    include("html/photos_tournois.html");
	    break;
	case 'photo_class':
	    include("html/photos_class.html");
	    break;
	case 'new_photo':
	    include("php/photos.php");
	    break;
            /*AUTRE*/

	case 'logout':
	    include("php/logout.php");
	    break;
	case 'err':
	case 'info':
	    include("php/info.php");
	    break;
	case 'configuration':
	    include("php/config.php");
	    break;
	default:
	    include("html/accueil.html");

        }
    } else {
        include("html/accueil.html");
    }
}
?>