<?php
require ("fonctions.php");
require("../tpl/libs/Smarty.class.php");
require("../mysql_connect.php");

$page = 0;

if(isset($_GET['page_news'])){
  $page = $_GET['page_news'];
}

$nb_page = $bdd->query("select count(*) from NEWS")->fetch()['count(*)']/10;

$reponse = $bdd->query("select * from NEWS order by id DESC");
$smarty = new Smarty();
$news = array();

$i = 0;

for(; $i < 10*($page-1) ; $i++){
  $data = $reponse->fetch();
}
 
$i = 0;

while($data = $reponse->fetch()){
  $news[$i]['id'] = $data['id'];
  $news[$i]['titre'] = $data['titre'];
  $news[$i]['date'] = $data['date'];
  $news[$i]['contenu'] = $data['contenu'];
  $news[$i]['img'] = get_PHOTO_byId($bdd, $data['IdPhoto'])['Fichier']; 
  $i++;
}


$smarty->assign("News", $news);
$smarty->display("html/news.html");

?>