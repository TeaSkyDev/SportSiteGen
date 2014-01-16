<?php
require("../tpl/libs/Smarty.class.php");
require("../mysql_connect.php");
$smarty = new Smarty();
$reponse = $bdd->query('select * from SITE');
$titre;
while($data = $reponse->fetch()){
  $titre = $data['Nom'];
}
$smarty->assign('Title', $titre);
$smarty->display('news.html');
?>