<?php

$info = array();

if(isset($_GET['page']) || isset($_POST['page'])) {
	$info['page'] = $_REQUEST['page'];
} else {
	$info['page'] = "accueil";
}

if(isset($_SESSION['connected']) && $_SESSION['connected']) {
	$info['connected'] = 'true';
	$info['pseudo']  = $_SESSION['user']['Pseudo'];
} else {
	$info['connected'] = 'false';
	$info['pseudo']  = "none";
}


$reponse = $bdd->query("select * from NEWS order by id DESC");
$reponse_e = $bdd->query("select * from EVENEMENT order by id DESC");
$news  = array();
$event = array();

$i = 0;
while($data = $reponse->fetch()){
  if($i < 6){
    $news[$i]['titre'] = $data['titre'];
    $news[$i]['date']  = $data['date'];
  }
  $i++;
}
$i = 0;
while($data = $reponse_e->fetch()){
  if($i < 6){
    $event[$i] = $data; 
  }
  $i++;
}


$smarty->assign("Post", $news);
$smarty->assign("Cal", $event);
$smarty->assign("Info", $info);
$smarty->display("html/header.html");
?>

