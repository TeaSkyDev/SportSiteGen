<?php
if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_verif']) && isset($_POST['email'])) {
	if(!add_UTILISATEUR($bdd, $_POST['pseudo'], $_POST['email'], md5($_POST['password']), 1, 1)) {
		echo "erreur<br>";
	} else {
		echo "ok<br>";
	}
}
?>