<?php


include ("Tournoi.php");
include ("../../mysql_connect.php");


$tou = new Tournoi($bdd);

$data = $tou->calc_nextMatch_byMatchsId(1,2);
echo var_dump($data);

?>