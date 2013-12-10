<html>
    <head>
        <title>SportSiteGen - Install</title>
        <script type="text/javascript" src="fonctions.js"></script>
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

if(isset($_POST['step'])) {
    $step = $_POST['step'];

    switch($step) {
        case "step_1":
            start_step_two();
            break;
        case "step_2":
            start_step_three();
            break;
        default:
            echo 'Erreur<br>';
    }

} else {
    /* Si nous sommes à la première étape, on vérifie qu'une installation n'a pas déjà eu lieu à l'aide d'un fichier de config */
    $cms_installed = check_cms_installed();

    if(!$cms_installed) {
        start_step_one();
    } else {
        echo 'Vous semblez avoir déjà installé ce cms sur ce serveur, un risque de conflit avec la base de données empêche l\'installation.<br>
              Si vous n\'avez pas effectué d\'installaion, vérifiez que le fichier cms.conf est présent dans le dossier d\'installation.';
    }

}?>
    </body>
</html>