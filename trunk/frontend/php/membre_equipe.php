<?php
$id = 1;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$reponse = $bdd->query("select count(*) from JOUEUR where IdTeam =".$id);
$nb_page = 1;
if($reponse){
  $nb_page = $reponse->fetch()['count(*)']/50;
}
$reponse = $bdd->query("select * from JOUEUR where IdTeam =".$id." order by id DESC");

$page = 0;
if(isset($_GET['page_membre'])){
  $page = $_GET['page_membre'];
}

$membre = array();
if($reponse){
  $i = 0;
  for(; $i < 50*($page-1) ; $i++){
    $data = $reponse->fetch();
  } 

  $i = 0;

  
  while($data = $reponse->fetch()){
    if($i < 50){
      $membre[$i] = $data;
      $membre[$i]['img'] = get_PHOTO_byId($bdd, $data['idPhoto'])['Fichier'];
    }
    else break;
  }
}
$smarty->assign("Membre", $membre);
$smarty->display("html/membre_equipe.html");
?>