<?php
$id = 1;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$reponse = $bdd->query("select * from JOUEUR where Id =".$id);
$joueur;
if($reponse){
  while($data = $reponse->fetch()){
    $joueur = $data;
    $joueur['img'] = get_PHOTO_byId($bdd, $data['idPhoto'])['Fichier'];
    $poste = get_POSTE_byId($bdd, $data['IdPoste']);
    $joueur['poste'] = $poste['Nom'];
    $joueur['descPoste'] = $poste['Description'];
  }
}

$smarty->assign("joueur", $joueur);
$smarty->display("html/fiche_joueur.html");
	    
?>