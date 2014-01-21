<?php


$reponse = $bdd->query("select count(*) from TEAM");
$nb_page = 1;
if($reponse){
  $nb_page = $reponse->fetch()['count(*)']/50;
}
$reponse = $bdd->query("select * from TEAM order by id DESC");
$equipe = array();

$page = 0;

if(isset($_GET['page_equipe'])){
  $page = $_GET['page_equipe'];
}
if($reponse){
  $i = 0;
  for(; $i < 50 *($page-1) ; $i++){
    if($reponse)
      $data = $reponse->fetch();
  }
  
  $i = 0;
  while($data = $reponse->fetch()){
    if($i < 50){
      $equipe[$i] = $data;
      $equipe[$i]['img'] = get_PHOTO_byId($bdd, $data['idPhoto'])['Fichier'];
      $i++;
    }
    else break;
  }
}

$smarty->assign("Equipe", $equipe);
$smarty->display("html/equipe.html");

?>