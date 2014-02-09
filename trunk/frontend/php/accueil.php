<?php
//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$reponse = $bdd->query("select * from NEWS order by Id DESC");
$news    = array();

$i = 0;
while($data = $reponse->fetch()){
	if($i < 10){
	  $news[$i]['id']      = $data['Id'];
	  $news[$i]['titre']   = $data['titre'];
	  $news[$i]['date']    = $data['date'];
	  $news[$i]['contenu'] = $data['contenu'];
	  $news[$i]['img']     = get_PHOTO_byId($bdd, $data['IdPhoto'])['Fichier'];
	  $i++;
	}
}

$reponse = $bdd->query("select * from EVENEMENT order by Id DESC");
$events  = array();

$i = 0;
while($data = $reponse->fetch()){
    if($i < 10){
        $events[$i]['id']      = $data['Id'];
        $events[$i]['titre']   = $data['titre'];
        $events[$i]['date']    = $data['date'];
        $events[$i]['contenu'] = $data['contenu'];
        $events[$i]['lieu']    = $data['location'];
        $i++;
    }
}

$smarty->assign("News", $news);
$smarty->assign("Events", $events);
$smarty->display("html/accueil.html");
?>

