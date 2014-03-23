<?php

$NB_MAX_FILES = 5;

if(isset($_GET['type'])) {
    echo "test";
    if($_GET['type'] == "match") {echo "test";
        if(isset($_POST['id_match'])) {echo "test";
            if(isset($_FILES)) {echo "test";
                $nb_files = 0;
                for($i = 0; $i < $NB_MAX_FILES; $i++) {
                    if(!empty($_FILES['photo']['name'][$i])) {
                        $nb_files++;
                    }
                }echo "test";
                if($nb_files > 0) {echo "test";
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
                        move_uploaded_file($_FILES['photo']['tmp_name'][$i], $path.$i."_".$_FILES['photo']['name'][$i]);
                    }

                    header("Location: index.php?page=photos_matchs");
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