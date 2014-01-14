<?php
$step_1 = "step_1";
$step_2 = "step_2";
$step_3 = "step_3";

$_SESSION['steps']['step1'] = true;
$_SESSION['steps']['step2'] = true;
$_SESSION['steps']['step3'] = true;
$_SESSION['steps']['step4'] = true;
$_SESSION['bdd'] = NULL;

$_SESSION[$step_1]["server"] = "info2";
$_SESSION[$step_1]["login"]  = "gas";
$_SESSION[$step_1]["pass"]   = "gas";
$_SESSION[$step_1]["bdd"]    = "DBgas";         
$_SESSION[$step_2]["login"]  = "gas";
$_SESSION[$step_2]["pass"]   = "a";
$_SESSION[$step_2]["mail"]   = "guidon@yaoor.fr";           
$_SESSION[$step_3]["nom"]    = "superSite";

?>