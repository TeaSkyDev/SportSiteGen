<?php
include ("Profil.php");
include ("../../mysql_connect.php");

$xml = simplexml_load_file("../xml/fiche1.xml");
$xml2 = simplexml_load_file("../xml/fiche2.xml");
$xml2->addChild("machin");

print_r($xml2);

echo "<table>";
foreach ( $xml->children() as $child ) {
    foreach ( $child as $key => $value ) {
	echo "<tr><td> ".$key." </td><td> | ".$value."</td></tr>";

    }
} 
echo "</table>";

file_put_contents("../xml/fiche2.xml", $xml2->asXML());


?>