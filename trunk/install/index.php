<html>
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

    echo '<table id="tab_progression">';
        echo '<tr>';
            echo '<td>Etape 1</td>';
            if($step == "step_1") {
                echo '<th>Etape 2</th>';
            } else {
                echo '<td>Etape 2</td>';
            }
            if($step == "step_2") {
                echo '<th>Etape 3</th>';
            } else {
                echo '<td>Etape 3</td>';
            }
            if($step == "step_3") {
                echo '<th>Etape 4</th>';
            } else {
                echo '<td>Etape 4</td>';
            }
        echo '</tr>';
    echo '</table>';

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

        echo '<table id="tab_progression">';
            echo '<tr>';
                echo '<th>Etape 1</th>';
                echo '<td>Etape 2</td>';
                echo '<td>Etape 3</td>';
                echo '<td>Etape 4</td>';
            echo '</tr>';
        echo '</table>';

        start_step_one();
    } else {
        echo 'Vous semblez avoir déjà installé ce cms sur ce serveur, un risque de conflit avec la base de données empêche l\'installation.<br>
              Si vous n\'avez pas effectué d\'installaion, vérifiez que le fichier cms.conf est présent dans le dossier d\'installation.';
    }

}?>
    </body>
</html>