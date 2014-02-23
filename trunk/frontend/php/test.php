<?php


include ("Tournoi.php");
include ("../../mysql_connect.php");


$tou = new Tournoi($bdd);
$data[0]['Id'] = 1;
$data[1]['Id'] = 2;
$data[2]['Id'] = 3;
$data[3]['Id'] = 4;

$data = $tou->calc_Tournoi_byMatchsId($data);
echo var_dump($data);
?>