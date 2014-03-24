<?php

$NB_MAX_FILES = 5;

if(isset($_GET['type'])) {
    if($_GET['type'] == "match") {
        if(isset($_POST['id_match'])) {
            if(isset($_FILES)) {
                $nb_files = 0;
                for($i = 0; $i < $NB_MAX_FILES; $i++) {
                    if(!empty($_FILES['photo']['name'][$i])) {
                        $nb_files++;
                    }
                }
                if($nb_files > 0) {
                    $path = "../photos/matchs/".$_POST['id_match'];
                    //si le dossier correspondant au match n'existe pas on le créé
                    if(!opendir($path)) {
                        if(!mkdir($path)) {
                            $msg = "Erreur lors de la création du dossier.";
                            header("Location: index.php?page=err&msg=".$msg);
                        }
                    }

                    for($i = 0; $i < $nb_files; $i++) {
                        $path .= "/";
                        if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], $path.$_FILES['photo']['name'][$i])) {
                            $bdd->query("insert into PHOTO values(null, '".$_FILES['photo']['name'][$i]."', '../photos/matchs/".$_POST['id_match']."/".$_FILES['photo']['name'][$i]."', 'aucune')");
                            $id_photo = $bdd->query("select MAX(Id) as id_max from PHOTO")->fetch()['id_max'];
                            $bdd->query("insert into PHOTO_MATCHS values(".$_POST['id_match'].", ".$id_photo.")");
                        }
                    }

                    header("Location: index.php?page=photos_matchs&match=".$_POST['id_match']);
                }
            } else {
                $msg = "Aucun fichier";
                header("Location: index.php?page=err&msg=".$msg);
            }
        } else {
            $msg = "Il manque l'id !";
            header("Location: index.php?page=err&msg=".$msg);
        }
    }
}

?>