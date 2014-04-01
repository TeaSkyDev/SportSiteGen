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
    $fichier = fopen("cms.conf", "r+");

    fseek($fichier, 0);
    fputs($fichier, "installed 1");
}

function recup_info($step) {
    switch($step) {
        case "step_1":
	    if(isset($_POST['server']) && isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['bdd'])) {
		$_SESSION[$step]["server"] = $_POST['server'];
		$_SESSION[$step]["login"]  = $_POST['login'];
		$_SESSION[$step]["pass"]   = $_POST['pass'];
		$_SESSION[$step]["bdd"]    = $_POST['bdd'];
		$_SESSION['steps'][$step] = true;
	    }
            break;
        case "step_2":
	    if(isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['mail'])) {
		$_SESSION[$step]["login"]  = $_POST['login'];
		$_SESSION[$step]["pass"]   = $_POST['pass'];
		$_SESSION[$step]["mail"]   = $_POST['mail'];
		$_SESSION['steps'][$step] = true;
	    }
            break;
        case "step_3":
	    if(isset($_POST['nom'])) {
		$_SESSION[$step]["nom"]    = $_POST['nom'];
		$_SESSION["steps"][$step] = true;
	    }
            break;
        default:
            echo 'Erreur';
    }
}

function exec_sql_file($bdd, $file) {

    $f = file($file);
    $content = "";
    $res = false;

    if($f) {
        foreach($f as $l) {
            $content .= $l;
        }
        $test = explode(";", $content);

        $bdd->beginTransaction();
        //$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $res = true;
        $i = 0;
        foreach($test as $req) {
            //echo var_dump($req);
            if(!empty($req) && $req != ";") {
                $r = $bdd->query($req);
                $i++;
                //if($i >= 19 && $i <= 36) { //On évite d'afficher les erreurs liées au 'drop table' car ces requetes ne sont là que par sécurité
                    if(!$r) {
                        echo '<font color="red">[!] Erreur lors de l\'éxecution de la requête n°'.$i.': '.$req.'</font><br>';
                        $res = false;
                    }
                //}
            }
        }

        $bdd->commit();
    }
    return $res;

}

function bdd_connexion($server, $login, $pass, $bdd) {
    echo "Server = ".$server.", Login = ".$login.", Base = ".$bdd."<br>";
    return new PDO('mysql:host='.$server.';dbname='.$bdd, $login, $pass);
}

function create_connexion_to_bdd_file($server, $login, $pass, $bdd) {
    $code = '<?php $bdd = new PDO(\'mysql:host='.$server.';dbname='.$bdd.'\', \''.$login.'\', \''.$pass.'\'); ?>';

    $file = fopen("../mysql_connect.php", "a+");
    fseek($file, 0);
    fwrite($file, $code);
    fclose($file);
}

function get_url_frontend() {
    //"http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"] -> Ne fonctionne pas pour certain protocoles !
    $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    return substr($url, 0, -17)."frontend/index.php";
}

function get_url_backend() {
    $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    return substr($url, 0, -17)."backend/index.php";
}

?>
