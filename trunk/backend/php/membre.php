<?php


$profil = new Profil($bdd);


$data = $profil->get_content();

$smarty->assign("Membre", $data);
$smarty->display("html/membre.html");
?>