<?php
/**
 * Date: 10/12/13
 *
 * Script d'installation du cms
 *
 */
$DEBUG = true;

session_start();
if(!isset($_SESSION['steps']) && !$DEBUG) {
    $_SESSION['steps']['step1'] = false;
    $_SESSION['steps']['step2'] = false;
    $_SESSION['steps']['step3'] = false;
    $_SESSION['steps']['step4'] = false;
    $_SESSION['bdd'] = NULL;
} else {
    require_once("debug.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
        <title>SportSiteGen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <script type="text/javascript" src="js/fonctions.js"></script>

<?php

require_once("php/steps.php");
require_once("php/fonctions.php");

if(isset($_POST['step']) || isset($_GET['step'])) {

    $step = $_REQUEST['step'];

    switch($step) {
        case "step_0":
            start_step_one();
            break;
        case "step_1":
            if(!$_SESSION['steps']['step1']) {
                recup_info("step_1");
                $_SESSION['steps']['step1'] = true;
            }
            start_step_two();
            break;
        case "step_2":
            if(!$_SESSION['steps']['step2']) {
                recup_info("step_2");
                $_SESSION['steps']['step2'] = true;
            }
            start_step_three();
            break;
        case "step_3":
            if(!$_SESSION['steps']['step3']) {
                recup_info("step_3");
                $_SESSION['steps']['step3'] = true;
            }
            show_recapitulatif();
            break;
        case "step_4":
            installation();
            break;
        default:
            echo 'Erreur<br>';
    }

    echo '<div id="navigation">';
		echo '<ul>';

            echo '<li><a href="index.php?step=step_0">Base de données</a></li>';
            if($step == "step_1") {
                echo '<li class="selected"><a href="#">Administrateur</a></li>';
            } else {
                if($_SESSION['steps']['step2']) {
                    echo '<li><a href="index.php?step=step_1">Administrateur</a></li>';
                } else {
                    echo '<li><a href="#">Administration</a></li>';
                }
            }
            if($step == "step_2") {
                echo '<li class="selected"><a href="#">Site web</a></li>';
            } else {
                if($_SESSION['steps']['step3']) {
                    echo '<li><a href="index.php?step=step_2">Site web</a></li>';
                } else {
                    echo '<li><a href="#">Site web</a></li>';
                }
            }
            if($step == "step_3") {
                echo '<li class="selected"><a href="#">Récapitulatif</a></li>';
            } else {
                if($_SESSION['steps']['step3']) {
                    echo '<li><a href="index.php?step=step_3">Récapitulatif</a></li>';
                } else {
                    echo '<li><a href="#">Récapitulatif</a></li>';
                }
            }
		echo '</ul>';
	echo '</nav>';


} else {
    /* Si nous sommes à la première étape, on vérifie qu'une installation n'a pas déjà eu lieu à l'aide d'un fichier de config */
    $cms_installed = check_cms_installed();

    if(!$cms_installed) {
        start_step_one();
?>
        <div id="navigation">
            <ul>
                <li class="selected">
                    <a href="#">Base de données</a>
                </li>
                <li>
                    <a href="#">Administrateur</a>
                </li>
                <li>
                    <a href="#">Site web</a>
                </li>
                <li>
                    <a href="#">Récapitulatif</a>
                </li>
            </ul>
        </div>
        </div>
        </div>
<?php

    } else {
        echo 'Vous semblez avoir déjà installé ce cms sur ce serveur, un risque de conflit avec la base de données empêche l\'installation.<br>
              Si vous n\'avez pas effectué d\'installaion, vérifiez que le fichier cms.conf est présent dans le dossier d\'installation.';
    }

}?>
    </body>
</html>