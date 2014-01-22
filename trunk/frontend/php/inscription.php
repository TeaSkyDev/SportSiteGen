<?php
if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_verif']) && isset($_POST['email'])) {
	if(!add_UTILISATEUR($bdd, $_POST['pseudo'], $_POST['email'], md5($_POST['password']), 1, 1)) {
		echo "erreur<br>";
	} else {
		$_SESSION['connected']        = true;
		$_SESSION['user']['Pseudo']   = $_POST['pseudo'];
		$_SESSION['user']['password'] = $_POST['password'];
		$_SESSION['user']['Mail']     = $_POST['email'];
		$_SESSION['user']['IdPhoto']  = 1;
		$_SESSION['user']['IdTypeUser'] = 1;
		header("Location: index.php");
	}
}
?>