<?php
require("../tpl/libs/Smarty.class.php");
require("../mysql_connect.php");

$reponse = $bdd->query("select * from NEWS");
$smarty  = new Smarty();
$info    = array();
$news    = array();

if(isset($_SESSION['connected']) && $_SESSION['connected']) {
	$info['connected'] = 'true';
	$info['pseudo']  = $_SESSION['user']['Pseudo'];
} else {
	$info['connected'] = 'false';
	$info['pseudo']  = "none";
}

$i = 0;
while($data = $reponse->fetch()){
  if($i < 6){
    $news[$i]['titre'] = $data['titre'];
    $news[$i]['date']  = $data['date'];
  }
  $i++;
}

$smarty->assign("Info", $info);
$smarty->assign("Post", $news);
$smarty->display("html/header.html");
?>

