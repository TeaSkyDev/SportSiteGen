<?php


include ("Tournoi.php");
include ("../../mysql_connect.php");
$param['v1'] = "lire_tourn";
$param['v2'] = 1;
$tour = new Tournoi($bdd, $param);

echo var_dump($tour->get_content());
echo var_dump($tour->get_content_match());

?>