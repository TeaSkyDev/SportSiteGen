<?php

session_start();

require_once("../mysql_connect.php"); //la variable $bdd vient d'ici
require_once("php/Init.php");
require_once("php/Header.php");
require_once("php/Content.class.php");
require_once("../tpl/libs/Smarty.class.php");
require_once("php/Aside.php");
$smarty  = new Smarty();

/* On initialise le cms en nous connectant à la BDD, on récupérant le template à utiliser, ainsi que les fichiers */
$init_cms = new Init($bdd);
$template = $init_cms->get_template();
$name     = $init_cms->get_name();
//$files    = init_cms->get_files();

/* On récupère le header Dont le menu */
$head = new Header($bdd);
$header = $head->get_content();

//On récupère le Aside 
$as = new Aside($bdd);
$asidenews = $as->get_content_news();
$asidecal = $as->get_content_calendrier();


/*On récupère le footer
$fo = new Footer($bdd);
$footer = $fo->get_content();
*/

// On récupère le corps du texte suivant ce qui a été demandé
$content = new Content($bdd, $template, $smarty);
if(isset($_GET['page']) || isset($_POST['page'])) {
	$page = $_REQUEST['page'];

	switch($page) {
		case "news":
			$content_html = $content->get_html("news");
			break;
        case "calendrier":
            $content_html = $content->get_html("calendrier");
            break;
		default:
			$content_html = $content->get_html("accueil");
	}
} else {
	$content_html = $content->get_html("accueil");
}

$smarty->assign("Header", $header);
$smarty->assign("Name", $name);
$smarty->assign("AsideNews", $asidenews);
$smarty->assign("AsideCal", $asidecal);
$smarty->assign("Content", $content_html);
//$smarty->assign("Footer", $footer);

$smarty->display("templates/".$template."/index.html");

?>