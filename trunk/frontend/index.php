<?php

session_start();

require_once("../mysql_connect.php"); //la variable $bdd vient d'ici
require_once("../Smarty/libs/Smarty.class.php");

require_once("php/Init.class.php");
require_once("php/Header.class.php");
require_once("php/Content.class.php");
require_once("php/Aside.class.php");
require_once("php/Log.class.php");

$smarty  = new Smarty();
$log     = new Log("log.txt");


/* On initialise le cms en nous connectant à la BDD, on récupérant le template à utiliser, ainsi que les fichiers */
$init_cms = new Init($bdd, $smarty);
$template = $init_cms->get_template(); //on récupère le template à utiliser
$name     = $init_cms->get_name();     //on récupère le nom du site

//on stocke ces deux dernières données dans des constantes pour ne pas les passer en paramètre partout
define("TEMPLATE", "templates/".$template);
define("SITE_NAME", $name);


/* On récupère le header Dont le menu */
$head = new Header($bdd, $smarty, $log);
$header = $head->get_content();


//On récupère le Aside 
$as = new Aside($bdd, $smarty);
$as = $as->get_content();


//On récupère la page demandée
if(isset($_GET['page']) || isset($_POST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = "home";
}


// On récupère le corps du texte suivant ce qui a été demandé
$content = new Content($bdd, $smarty, $page);
$content_page = $content->get_content();


$smarty->assign("Header", $header);
$smarty->assign("Aside", $aside);
$smarty->assign("Content", $content_html);


//On affiche tout
$smarty->display(TEMPLATE."/index.html");

?>