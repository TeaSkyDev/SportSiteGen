<?php
require_once("../../mysql_connect.php");
session_start();

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_verif']) && isset($_POST['mail'])) {
	$query = $bdd->query("insert into UTILISATEUR values(NULL, ".$_POST['pseudo'].", ".$_POST['mail'].", ".$_POST['password'].", NULL, NULL");
}
?>