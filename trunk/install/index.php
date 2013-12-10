<html>
    <head>
        <title>SportSiteGen - Install</title>

        <script>
            function verif_form_1(f) {
                var rep = true;
                if(f.server.value.length == 0) {
                    f.server.style.backgroundColor = "#fba";
                    rep = false;
                }
                if(f.login.value.length == 0) {
                    f.login.style.backgroundColor = "#fba";
                    rep = false;
                }
                if(f.pass.value.length == 0) {
                    f.pass.style.backgroundColor = "#fba";
                    rep = false;
                }
                if(f.mail.value.length == 0) {
                    f.mail.style.backgroundColor = "#fba";
                    rep = false;
                }
                if(f.bdd.value.length == 0) {
                    f.bdd.style.backgroundColor = "#fba";
                    rep = false;
                }

                if(!rep) {
                    alert("Il faut remplir tous les champs !");
                    return false;
                } else {
                    return true;
                }
            }
        </script>
    </head>
    <body>


<?php
/**
 * Date: 10/12/13
 *
 * Script d'installation du cms
 *
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

function start_step_one() {
    echo '<h1 align="center">Etape 1</h1>';
    echo '<form method="POST" action="index.php" onSubmit="return verif_form_1(this)"/>';
    echo '<table align="center">';
        echo '<tr>';
            echo '<td colspan="2"><i>Creation de la base de donnees...</i></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Serveur :</th><td><input type="text" name="server"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Login   :</th><td><input type="text" name="login"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Mot de passe :</th><td><input type="password" name="pass"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Mail :</th><td><input type="text" name="mail"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Base de donnees :</th><td><input type="text" name="bdd"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th colspan="2"><input type="submit" value="Ok"/>';
        echo '</tr>';
    echo '</table>';
        echo '<input type="hidden" name="step" value="step_1"/>';
    echo '</form>';
}

function start_step_two() {
    var_dump($_POST);
}

if(isset($_POST['step'])) {
    $step = $_POST['step'];

    switch($step) {
        case "step_1":
            start_step_two();
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