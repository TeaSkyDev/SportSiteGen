<?php

$NB_MAX_FILES = 5;

if(isset($_GET['type'])) {
    if($_GET['type'] == "match") {
        if(isset($_POST['id_match'])) {
            if(isset($_FILES)) { 
		$path = "../photos/matchs/".$_POST['id_match'];
		//si le dossier correspondant au match n'existe pas on le créé
		if(!opendir($path)) {
		    if(!mkdir($path)) {
			$msg = "Erreur lors de la création du dossier.";
			header("Location: index.php?page=err&msg=".$msg);
		    }
		}

		$i = 0;
		$path .="/";
		while ( isset($_FILES['photo']['name'][$i]) ) {
		    
		    if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], $path.$_FILES['photo']['name'][$i])) {
			$bdd->query("insert into PHOTO values(null, '".$_FILES['photo']['name'][$i]."', '../photos/matchs/".$_POST['id_match']."/".$_FILES['photo']['name'][$i]."', 'aucune')");
			$id_photo = $bdd->query("select MAX(Id) as id_max from PHOTO")->fetch()['id_max'];
			$bdd->query("insert into PHOTO_MATCHS values(".$_POST['id_match'].", ".$id_photo.")");
		    }
		    $i++;
		}

		header("Location: index.php?page=photos_matchs&match=".$_POST['id_match']);
	    
	    } else {
		$msg = "Aucun fichier";
		header("Location: index.php?page=err&msg=".$msg);
	    }
	} else {
	    $msg = "Il manque l'id !";
	    header("Location: index.php?page=err&msg=".$msg);
	}
    } else if($_GET['type'] == "tournoi") {
        if(isset($_POST['id_tournoi'])) {
            if(isset($_FILES)) {    
		$path = "../photos/tournois/".$_POST['id_tournoi'];
		//si le dossier correspondant au tournois n'existe pas on le créé
		if(!@opendir($path)) {
		    if(!mkdir($path)) {
			$msg = "Erreur lors de la création du dossier.";
			header("Location: index.php?page=err&msg=".$msg);
		    }
		}
		$i = 0;
		$path .= "/";
		while ( isset($_FILES['photo']['name'][$i] ) ) {
		    if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], $path.$_FILES['photo']['name'][$i])) {
			$bdd->query("insert into PHOTO values(null, '".$_FILES['photo']['name'][$i]."', '../photos/tournois/".$_POST['id_tournoi']."/".$_FILES['photo']['name'][$i]."', 'aucune')");
			$id_photo = $bdd->query("select MAX(Id) as id_max from PHOTO")->fetch()['id_max'];
			$bdd->query("insert into PHOTO_TOURNOIS values(".$_POST['id_tournoi'].", ".$id_photo.")");
		    }
		    $i++;
		}
		
		header("Location: index.php?page=photos_tournois&tournoi=".$_POST['id_tournoi']);
		
	    } else {
		$msg = "Aucun fichier";
		header("Location: index.php?page=err&msg=".$msg);
	    }
	} else {
	    $msg = "Il manque l'id !";
	    header("Location: index.php?page=err&msg=".$msg);
	}
    } else if ( $_GET['type'] == "autres" ) {
	if (isset($_FILES )) {
	    $path = "../photos/autres";
	    //si le dossier correspondant au tournois n'existe pas on le créé
	    if(!opendir($path)) {
		if(!mkdir($path)) {
		    $msg = "Erreur lors de la création du dossier.";
		    header("Location: index.php?page=err&msg=".$msg);
		}
	    }
	    $path .= "/";
	    $i = 0;
	    while ( isset($_FILES['photo']['name'][$i]) ) {
		
		if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], $path.$_FILES['photo']['name'][$i])) {
		    $bdd->query("insert into PHOTO values(null, '".$_FILES['photo']['name'][$i]."', '../photos/autres/".$_FILES['photo']['name'][$i]."', 'aucune')");
		}
		$i++;
	    }
	    header("Location: index.php?page=photo_class");
	} else {
	    $msg = "Aucun fichier";
	    header("Location: index.php?page=err&msg=".$msg);
	}
    } else {
	$msg = "Il manque l'id !";
	header("Location: index.php?page=err&msg=".$msg);
    }
}

?>