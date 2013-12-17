<?php

/*
    Fichier regroupant les principales fonctions php
*/

function check_cms_installed() {
    $fichier = fopen("cms.conf", "r");

    if($fichier) {
        $ligne = fgets($fichier);
        $val   = substr($ligne, 10, 11);

        if($val != 0) {
            return true;
        } else {
            return false;
        }

    } else {
        echo '<p>Erreur lors de l\'ouverture du fichier de configuration.</p>';
        return true;
    }
}

function recup_info($step) {
    switch($step) {
        case "step_1":
            $_SESSION[$step]["server"] = $_POST['server'];
            $_SESSION[$step]["login"]  = $_POST['login'];
            $_SESSION[$step]["pass"]   = $_POST['pass'];
            $_SESSION[$step]["bdd"]    = $_POST['bdd'];
            break;
        case "step_2":
            $_SESSION[$step]["login"]  = $_POST['login'];
            $_SESSION[$step]["pass"]   = $_POST['pass'];
            $_SESSION[$step]["mail"]   = $_POST['mail'];
            break;
        case "step_3":
            $_SESSION[$step]["nom"]    = $_POST['nom'];
            break;
        default:
            echo 'Erreur';
    }
}

function exec_sql_file($file) {

    $f = file($file);
    $content = "";

    if($f) {
        foreach($f as $l) {
            $content .= $l;
        }
        $test = explode(";", $content);

        foreach($test as $req) {
            echo $req.'<br>';
            $r = mysql_query($req);
            if(!$r) {
                echo 'erreur<br>';
            } else {
                echo 'ok';
            }
        }
    }

}

?>