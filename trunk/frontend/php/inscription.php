<?php
require_once("../../mysql_connect.php");
include("../fonctions.php");
session_start();

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_verif']) && isset($_POST['mail'])) {
	add_UTILISATEUR($bdd, $_POST['pseudo'], $_POST['mail'], md5($_POST['password']), 1, 1);
	header("Location: ../index.php?page=login");
}
?>