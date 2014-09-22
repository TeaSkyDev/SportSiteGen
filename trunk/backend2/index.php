<?php

session_start();

require_once("../mysql_connect.php"); //la variable $bdd vient d'ici
require_once("../Smarty/libs/Smarty.class.php"); //moteur de template smarty

require_once("php/Content.class.php");
require_once("php/Log.class.php");
require_once("php/Message.class.php");
require_once("php/Connexion.class.php");

$smarty  = new Smarty();

//si l'admin n'est pas connecté, on va chercher la page de connexion
if(!isset($_SESSION['admin_connected']) || !$_SESSION['admin_connected']) {
    $_SESSION['admin_connected'] = false;
    $connexion = new Connexion($bdd, $smarty);
    $content_page   = $connexion->get_contenu();
} else {
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "home";
    }
    $content = new Content($bdd, $smarty, $page);
    $content_page = $content->get_content();
}

$smarty->assign("Admin_connected", $_SESSION['admin_connected']);
$smarty->assign("Content", $content_page);

$smarty->display("html/index.html");

?>