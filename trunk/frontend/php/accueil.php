<?php
//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$reponse = $bdd->query("select * from NEWS order by id DESC");
$news    = array();

$i = 0;
while($data = $reponse->fetch()){
	if($i < 10){
	  $news[$i]['id'] = $data['Id'];
	  $news[$i]['titre'] = $data['titre'];
	  $news[$i]['date'] = $data['date'];
	  $news[$i]['contenu'] = $data['contenu'];
	  $news[$i]['img'] = get_PHOTO_byId($bdd, $data['IdPhoto'])['Fichier']; 
	  $i++;
	}
}

$smarty->assign("News", $news);
$smarty->display("html/accueil.html");
?>

