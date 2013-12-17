<?php

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

function start_step_one() {
?>
    <link rel="stylesheet" href="design.css" type="text/css" media="screen"/>
    </head>

    <body>
    <div id="content">
    <h1>Installation SportSiteGen</h1>
    <div id="wrapper">
    <div id="steps">
        <form id="formElem" name="formElem" action="index.php" method="post" onsubmit="return verif_form_1(this)">

            <fieldset class="step">
                <legend>Installation de la base de données</legend>
                <p>
                    <label for="serveur">Serveur</label>
                    <input id="serveur" name="server" />
                </p>
                <p>
                    <label for="login">Login</label>
                    <input id="login" name="login"/>
                </p>
                <p>
                    <label for="password">Mot de passe</label>
                    <input id="password" name="pass" type="password"/>
                </p>
                <p>
                    <label for="bd">Base de données</label>
                    <input id="bd" name="bdd"/>
                </p>
            </fieldset>
            <input type="hidden" name="step" value="step_1"/>
            <input type="submit" value="Suivant" id="suivant" name="suivant" />
        </form>
    </div>
<?php
}

function start_step_two() {

    /* var_dump permet d'afficher le contenu de varaibles et tableau, pratique pour savoir si toutes les info d'un form sont passées */
    echo '# DEBUG :<br>';
    //var_dump($_POST);

    ?>
    <link rel="stylesheet" href="design.css" type="text/css" media="screen"/>
    </head>

<body>
    <div id="content">
    <h1>Installation SportSiteGen</h1>
    <div id="wrapper">
    <div id="steps">
        <form id="formElem" name="formElem" action="index.php" method="post" onsubmit="return verif_form_2(this)">

            <fieldset class="step">
                <legend>Création compte administrateur</legend>
                <p>
                    <label for="login">Login</label>
                    <input id="login" name="login" type="text"/>
                </p>
                <p>
                    <label for="mail">Mail</label>
                    <input id="mail" name="mail" placeholder="exemple@exemple.fr" type="email"/>
                </p>
                <p>
                    <label for="password">Mot de passe</label>
                    <input id="password" name="pass" type="password"/>
                </p>
                <p>
                    <label for="passwordconf">Confirmer mot de passe</label>
                    <input id="passwordconf" name="pass_verif" type="password"/>
                </p>

            </fieldset>
            <input type="hidden" name="step" value="step_2"/>
            <input type="submit" value="Suivant" id="suivant" name="suivant" />
        </form>
    </div>
<?php 
}

function start_step_three() {

    //var_dump($_POST);

    ?>
    <link rel="stylesheet" href="design.css" type="text/css" media="screen"/>
    </head>

    <body>
    <div id="content">
    <h1>Installation SportSiteGen</h1>
    <div id="wrapper">
        <div id="steps">
            <form id="formElem" name="formElem" action="index.php" method="post" onsubmit="return verif_form_3(this)">

                <fieldset class="step">
                    <legend>Nom de votre site web</legend>
                    <p style="margin-top:90px;">
                        <label for="nom">Nom</label>
                        <input id="nom" name="nom" />
                    </p>
                </fieldset>
                <input type="hidden" name="step" value="step_3"/>
                <input type="submit" value="Suivant" id="suivant" name="suivant" />
            </form>
        </div>
<?php
}

function show_recapitulatif() {
    ?>
    <link rel="stylesheet" href="stylerecap.css" type="text/css" media="screen"/>
    </head>

    <body>
    <div id="content">
    <h1>Installation SportSiteGen</h1>
    <div id="wrapper">
        <div id="steps">
            <div id="recap">
                <fieldset class="step">
                    <legend>Récapitulatif</legend>
                    <table>
                        <tr>
                            <td class="nom">Nom du site</td>
                            <td class="info"><?php echo $_SESSION['step_3']['nom']; ?></td>
                        </tr>
                        <tr>
                            <td class="nom">Serveur</td>
                            <td class="info"><?php echo $_SESSION['step_1']['server']; ?></td>
                        </tr>
                        <tr>
                            <td class="nom">Login</td>
                            <td class="info"><?php echo $_SESSION['step_1']['login']; ?></td>
                        </tr>
                        <tr>
                            <td class="nom">Mot de passe</td>
                            <td class="info"><?php echo $_SESSION['step_1']['pass']; ?></td>
                        </tr>
                        <tr>
                            <td class="nom">Base de données</td>
                            <td class="info"><?php echo $_SESSION['step_1']['bdd']; ?></td>
                        </tr>
                        <tr>
                            <td class="nom">Login administrateur</td>
                            <td class="info"><?php echo $_SESSION['step_2']['login']; ?></td>
                        </tr>
                        <tr>
                            <td class="nom">Mot de passe administrateur</td>
                            <td class="info"><?php echo $_SESSION['step_2']['pass']; ?></td>
                        </tr>
                        <tr>
                            <td class="nom">Mail administrateur</td>
                            <td class="info"><?php echo $_SESSION['step_2']['mail']; ?></td>
                        </tr>

                    </table>
                </fieldset>
                <input type="button" value="Terminer" id="suivant" name="suivant" />
            </div>
        </div>
    <?php
}