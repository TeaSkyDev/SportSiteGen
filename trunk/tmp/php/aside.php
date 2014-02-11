<?php
$reponse = $bdd->query("select * from NEWS");
$news    = array();

$i = 0;
while($data = $reponse->fetch()){
  if($i < 6){
    $news[$i]['titre'] = $data['titre'];
    $news[$i]['date']  = $data['date'];
  }
  $i++;
}

$smarty->assign("Post", $news);
$smarty->display("html/aside.html");
?>