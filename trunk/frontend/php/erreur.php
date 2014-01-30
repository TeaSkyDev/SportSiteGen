<?php
$msg = "";
if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}

$smarty->assign("erreur", $msg);
$smarty->display("html/erreur.html");

?>