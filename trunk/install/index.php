<!--<html>
    <head>
        <title>SportSiteGen - Install</title>
        <script type="text/javascript" src="fonctions.js"></script>

        <style>
            #tab_progression {
                margin: auto;
                border: 1px solid black;
            }
            #tab_progression td, #tab_progression th {
                width: 200px;
                text-align: center;
                border: 1px solid black;
            }
        </style>
    </head>-->

<!DOCTYPE html>
<html>
	<head>
    		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    		<link href='http://fonts.googleapis.com/css?family=Romanesco' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="design.css" />
            <title>SSG - Etape 1</title>
    	</head>

    <body>


<?php

/**
 * Date: 10/12/13
 *
 * Script d'installation du cms
 *
 */
require_once("fonctions.php");

echo '<h1 align="center">Script d\'installation</h1>';

if(isset($_POST['step'])) {

    $step = $_POST['step'];

    echo '<nav>';
		echo '<ul>';
           /* if($step == "step_1") {
			    echo '<div class="current"> <li><span>2</span> Base de données</li></div>';
            } else {*/
                echo '<li><span>1</span> Base de données</li>';
            //}
            if($step == "step_1") {
                echo '<div class="current"> <li><span>2</span> Administrateur</li></div>';
            } else {
                echo '<li><span>2</span> Administrateur</li>';
            }
            if($step == "step_2") {
                echo '<div class="current"> <li><span>3</span> Nom du site</li></div>';
            } else {
                echo '<li><span>3</span> Nom du site</li>';
            }
            if($step == "step_3") {
                echo '<div class="current"> <li><span>4</span> Récapitulatif</li></div>';
            } else {
                echo '<li><span>4</span> Récapitulatif</li>';
            }
		echo '</ul>';
	echo '</nav>';



    switch($step) {
        case "step_1":
            start_step_two();
            break;
        case "step_2":
            start_step_three();
            break;
        case "step_3":
            show_recapitulatif();
            break;
        default:
            echo 'Erreur<br>';
    }

} else {
    /* Si nous sommes à la première étape, on vérifie qu'une installation n'a pas déjà eu lieu à l'aide d'un fichier de config */
    $cms_installed = check_cms_installed();

    if(!$cms_installed) {

        echo '<nav>';
			echo '<ul>';
				echo '<div class="current"> <li><span>1</span> Base de données</li></div>';
				echo '<li><span>2</span> Administrateur</li>';
				echo '<li><span>3</span> Nom du site</li>';
				echo '<li><span>4</span> Récapitulatif</li>';
			echo '</ul>';
		echo '</nav>';

        start_step_one();
    } else {
        echo 'Vous semblez avoir déjà installé ce cms sur ce serveur, un risque de conflit avec la base de données empêche l\'installation.<br>
              Si vous n\'avez pas effectué d\'installaion, vérifiez que le fichier cms.conf est présent dans le dossier d\'installation.';
    }

}?>
    </body>
</html>