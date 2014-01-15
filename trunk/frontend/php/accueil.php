<?php
	if(isset($_SESSION['connected']) && $_SESSION['connected']) {
		echo '<a href="index.php?page=logout">logout</a><br>';	
		echo '<h1 align="center">Bienvenue '.$_SESSION['user']['Pseudo'].'</h1>';	
	} else {
		echo '<a href="index.php?page=login">login</a><br>';
		echo '<a href="index.php?page=inscription">Inscription</a></br>';
	}
?>

