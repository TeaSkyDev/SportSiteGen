<?php

session_start();

require_once("../mysql_connect.php"); //la variable $bdd vient d'ici
require_once("php/Init.php");
require_once("php/Header.php");
require_once("../tpl/libs/Smarty.class.php");
$smarty  = new Smarty();

/* On initialise le cms en nous connectant à la BDD, on récupérant le template à utiliser, ainsi que les fichiers */
$init_cms = new Init($bdd);
$template = $init_cms->get_template();
echo $template;
//$files    = init_cms->get_files();

/* On récupère le header Dont le menu */
$head = new Header($bdd);
$header = $head->get_content();
$title  = $head->get_title();

/* On récupère le Aside 
$as = new Aside($bdd);
$aside = $as->get_content();

/* On récupère le footer 
$fo = new Footer($bdd);
$footer = $fo->get_content();

/* On récupère le corps du texte suivant ce qui a été demandé 
if(isset($_GET['page']) || isset($_POST['page'])) {
	$page = $_REQUEST['page'];
	$content = new Content($bdd, $template);

	switch($page) {
		case "news":
			$content_html = $content->get_html("news");
			break;
		default:
			$content_html = $content->get_html("accueil");
	}
} else {
	$content_html = $content->get_html("accueil");
}
*/
$smarty->assign("Header", $header);
$smarty->assign("Title", $title);
/*$smarty->assign("Aside", $aside);
$smarty->assign("Content", $content_html);
$smarty->assign("Footer", $footer);*/

$smarty->display("templates/".$template."/index.html");

?>