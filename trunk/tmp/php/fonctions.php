<?php
require_once("../../mysql_connect.php");
function get_nb_photos($bdd) {
	$nb = $bdd->query("select count(*) from PHOTO");
	if($nb) {
		$res = $nb->fetch();
		return $res[0];
	} else {
		return -1;
	}
}

function get_nb_type_user($bdd) {
	$nb = $bdd->query("select count(*) from TYPE_USER");
	if($nb) {
		$res = $nb->fetch();
		return $res[0];
	} else {
		return -1;
	}
}
?>