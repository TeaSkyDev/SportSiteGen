<?php
$page = 0;
$reponse = $bdd->query("select * from EVENEMENT order by id DESC");
$page = $bdd->query("select count(*) from EVENEMENT");
$page_num = 0;

if($page)
  $page_num = $page->fetch()['count(*)']/10;
$event = array();

$i = 0;
if($reponse){
  for(; $i < 10*($page_num-1) ; $i++){
    $data = $reponse->fetch();
  }
  
  $i = 0;
  while($data = $reponse->fetch()){
    if($i < 10){
      echo $i;
      $event[$i] = $data;
    }
    $i++;
  }  
}

$smarty->assign("Event", $event);
$smarty->display("html/calendrier.html");
?>