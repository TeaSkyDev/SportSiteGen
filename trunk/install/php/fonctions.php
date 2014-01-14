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

function cms_installed() {
    $fichier = fopen("cms.conf", "r");

    fseek($fichier, 0);
    fputs($fichier, "installed 1");
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

function exec_sql_file($bdd, $file) {

    $f = file($file);
    $content = "";

    if($f) {
        foreach($f as $l) {
            $content .= $l;
        }
        $test = explode(";", $content);

        $bdd->beginTransaction();
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $i = 0;
        foreach($test as $req) {
            echo var_dump($req);
            if(!empty($req) && $req != ";") {
                $r = $bdd->query($req);
                $i++;
                //if($i >= 19 && $i <= 36) { //On évite d'afficher les erreurs liées au 'drop table' car ces requetes ne sont là que par sécurité
                    if(!$r) {
                        echo '<font color="red">[!] Erreur lors de l\'éxecution de la requête n°'.$i.': '.$req.'</font><br>';
                    } else {
                        echo '<font color="green">Requete n°'.$i.' : OK</font><br>';
                    }
                //}
            }
        }

        $bdd->commit();
    }

}

function bdd_connexion($server, $login, $pass, $bdd) {
    echo "server = ".$server.", login = ".$login.", ".$pass.", ".$bdd."<br>";
    //mysql_connect($server, $login, $pass);
    //mysql_select_db($bdd);
    return new PDO('mysql:host='.$server.';dbname='.$bdd, $login, $pass);
}

function create_connexion_to_bdd_file($server, $login, $pass, $bdd) {
    /*$code = '
    <?php
    mysql_connect("'.$server.'", "'.$login.'", "'.$pass.'");
    mysql_select_db("'.$bdd.'");
    ?>
    ';*/
    $code = '<?php $bdd = new PDO(\'mysql:host='.$server.';dbname='.$bdd.'\', \''.$login.'\', \''.$pass.'\'); ?>';

    $file = fopen("mysql_connect.php", "a+");
    fwrite($file, $code);
    fclose($file);
}

?>
