<?php
require ("fonctions.php");
require("../tpl/libs/Smarty.class.php");
require("../mysql_connect.php");
$reponse = $bdd->query("select * from NEWS");
$smarty = new Smarty();
$news = array();
$i = 0;
while($data = $reponse->fetch()){
  $news[$i]['id'] = $data['id'];
  $news[$i]['titre'] = $data['titre'];
  $news[$i]['date'] = $data['date'];
  $news[$i]['contenu'] = $data['contenu'];
  $news[$i]['img'] = get_PHOTO_byId($bdd, $data['IdPhoto'])['Nom'];
  $i++;
}

$smarty->assign("News", $news);
$smarty->display("html/news.html");
?>