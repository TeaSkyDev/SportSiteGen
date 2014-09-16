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
$init_cms = new Init($bdd);
$template = $init_cms->get_template(); //on récupère le template à utiliser
$name     = $init_cms->get_name();     //on récupère le nom du site

/* On récupère le header Dont le menu */
$head = new Header($bdd, $template, $name, $smarty, $log);
$header = $head->get_content();

//On récupère le Aside 
$as = new Aside($bdd);
$as = $as->get_content();


/*On récupère le footer
  $fo = new Footer($bdd);
  $footer = $fo->get_content();
*/

// On récupère le corps du texte suivant ce qui a été demandé
$content = new Content($bdd, $template, $smarty);
if(isset($_GET['page']) || isset($_POST['page'])) {
    $page = $_REQUEST['page'];
    $param = get_params($_GET, $_POST); /* On récupère tous les params sauf la page */
    $content_html = $content->get_html($page, $param);

    if ($page == "deconnexion"){
        unset($_SESSION);
        session_destroy();
        header("Location:  index.php");
    }
} else {
    $content_html = $content->get_html("accueil");
}


$smarty->assign("Header", $header);
$smarty->assign("Aside", $aside);
$smarty->assign("Content", $content_html);
//$smarty->assign("Footer", $footer);

$smarty->display("templates/".$template."/index.html");

?>