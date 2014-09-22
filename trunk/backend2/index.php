<?php

session_start();

require_once("../mysql_connect.php"); //la variable $bdd vient d'ici
require_once("../Smarty/libs/Smarty.class.php"); //moteur de template smarty

require_once("php/Content.class.php");
require_once("php/Log.class.php");
require_once("php/Message.class.php");
require_once("php/Connexion.class.php");
require_once("php/Header.class.php");
require_once("php/Photo.class.php");
require_once("php/Profil.class.php");
require_once("php/News.class.php");

$smarty  = new Smarty();

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "home";
}


//si l'admin n'est pas connecté, on va chercher la page de connexion
if(!isset($_SESSION['admin_connected']) || !$_SESSION['admin_connected']) {
    $_SESSION['admin_connected'] = false;
    $connexion = new Connexion($bdd, $smarty);
    $content_page   = $connexion->get_contenu();
} else {

    //on va chercher le contenu du header
    $header = new Header($bdd, $smarty, $page);
    $content_header = $header->get_content();
    $smarty->assign("Header", $content_header);

    //on va chercher le contenu de la fonctionnalité demandée
    $content = new Content($bdd, $smarty, $page);
    $content_page = $content->get_content();
}

$smarty->assign("Admin_connected", $_SESSION['admin_connected']);
$smarty->assign("Content", $content_page);

//affichage de la page
$smarty->display("html/index.html");

?>