<?php

$info    = array();

if(isset($_SESSION['connected']) && $_SESSION['connected']) {
	$info['connected'] = 'true';
	$info['pseudo']  = $_SESSION['user']['Pseudo'];
} else {
	$info['connected'] = 'false';
	$info['pseudo']  = "none";
}

$smarty->assign("Info", $info);
$smarty->display("html/header.html");
?>

