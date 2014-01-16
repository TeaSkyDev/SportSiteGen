<?php


function start_step_one() {
    include("header.php");
?>
    <div id="wrapper">
    <div id="steps">
        <form id="formElem" name="formElem" action="index.php" method="post" onsubmit="return verif_form_1(this)">

            <fieldset class="step">
                <legend>Installation de la base de données</legend>
                <p>
                    <label for="serveur">Serveur</label>
                    <?php
                        if($_SESSION['steps']['step1']) {
                            echo '<input id="serveur" name="server" value="'.$_SESSION['step_1']['server'].'"/>';
                        } else {
                            echo '<input id="serveur" name="server" />';
                        }
                    ?>
                </p>
                <p>
                    <label for="login">Login</label>
                    <?php
                    if($_SESSION['steps']['step1']) {
                        echo '<input id="login" name="login" value="'.$_SESSION['step_1']['login'].'"/>';
                    } else {
                        echo '<input id="login" name="login"/>';
                    }
                    ?>
                </p>
                <p>
                    <label for="password">Mot de passe</label>
                    <?php
                    if($_SESSION['steps']['step1']) {
                        echo '<input id="password" name="pass" type="password" value="'.$_SESSION['step_1']['pass'].'"/>';
                    } else {
                        echo '<input id="password" name="pass" type="password"/>';
                    }
                    ?>
                </p>
                <p>
                    <label for="bd">Base de données</label>
                    <?php
                    if($_SESSION['steps']['step1']) {
                        echo '<input id="bd" name="bdd" value="'.$_SESSION['step_1']['bdd'].'"/>';
                    } else {
                        echo '<input id="bd" name="bdd"/>';
                    }
                    ?>
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

    include("header.php");
    ?>
    <div id="wrapper">
    <div id="steps">
        <form id="formElem" name="formElem" action="index.php" method="post" onsubmit="return verif_form_2(this)">

            <fieldset class="step">
                <legend>Création compte administrateur</legend>
                <p>
                    <label for="login">Login</label>
                    <?php
                    if($_SESSION['steps']['step2']) {
                        echo '<input id="login" name="login" type="text" value="'.$_SESSION['step_2']['login'].'"/>';
                    } else {
                        echo '<input id="login" name="login" type="text"/>';
                    }
                    ?>
                </p>
                <p>
                    <label for="mail">Mail</label>
                    <?php
                    if($_SESSION['steps']['step2']) {
                        echo '<input id="mail" name="mail" placeholder="exemple@exemple.fr" type="email" value="'.$_SESSION['step_2']['mail'].'"/>';
                    } else {
                        echo '<input id="mail" name="mail" placeholder="exemple@exemple.fr" type="email"/>';
                    }
                    ?>
                </p>
                <p>
                    <label for="password">Mot de passe</label>
                    <?php
                    if($_SESSION['steps']['step2']) {
                        echo '<input id="password" name="pass" type="password" value="'.$_SESSION['step_2']['pass'].'"/>';
                    } else {
                        echo '<input id="password" name="pass" type="password"/>';
                    }
                    ?>
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

    include("header.php");
    ?>
    <div id="wrapper">
        <div id="steps">
            <form id="formElem" name="formElem" action="index.php" method="post" onsubmit="return verif_form_3(this)">

                <fieldset class="step">
                    <legend>Nom de votre site web</legend>
                    <p style="margin-top:90px;">
                        <label for="nom">Nom</label>
                        <?php
                        if($_SESSION['steps']['step3']) {
                            echo '<input id="nom" name="nom" value="'.$_SESSION['step_3']['nom'].'"/>';
                        } else {
                            echo '<input id="nom" name="nom" />';
                        }
                        ?>
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
    <link rel="stylesheet" href="css/stylerecap.css" type="text/css" media="screen"/>
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
                <form method="POST" action="index.php"/>
                    <input type="hidden" name="step" value="step_4"/>
                    <input type="submit" value="Terminer" id="suivant" name="suivant" />
                </form>
            </div>
        </div>
    <?php
}

function installation() {
    include("header.php");

    $bdd = bdd_connexion($_SESSION['step_1']['server'], $_SESSION['step_1']['login'], $_SESSION['step_1']['pass'], $_SESSION['step_1']['bdd']);
    create_connexion_to_bdd_file($_SESSION['step_1']['server'], $_SESSION['step_1']['login'], $_SESSION['step_1']['pass'], $_SESSION['step_1']['bdd']);

    echo '<h1 align="center">Création de la base de données</h1>';
    $creation_reussie = exec_sql_file($bdd, "sql/Creation.sql");
    if($creation_reussie) {
        echo "Création de la base de données réussie !<br>";
    }
    echo '<h1 align="center">Insertions dans la base de données</h1>';

    $bdd->beginTransaction();
    //$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_1 = $bdd->query("insert into SITE values ('".$_SESSION['step_3']['nom']."', '".get_url_frontend()."')");
    $sql_2 = $bdd->query("insert into PHOTO values (1,'avatar_admin','defaut.png','')");
    $sql_3 = $bdd->query("insert into TYPE_USER values (1,'Administrateur','Grand maitre du site')");
    $sql_4 = $bdd->query("insert into UTILISATEUR values (1,'".$_SESSION['step_2']['login']."', '".$_SESSION['step_2']['mail']."', '".md5($_SESSION['step_2']['pass'])."',1,1)");
    $insertions_reussies = true;

    $bdd->commit();

    if(!$sql_1) {
        $insertions_reussies = false;
    }
    if(!$sql_2) {
        $insertions_reussies = false;
    }
    if(!$sql_3) {
        $insertions_reussies = false;
    }
    if(!$sql_4) {
        $insertions_reussies = false;
    }

    if($insertions_reussies) {
        echo "Insertions dans la base de données réussies !<br><br>";
    }

    if($creation_reussie && $insertions_reussies) {
        unset($_SESSION);
        cms_installed(); 
        echo 'Bravo votre cms est maintenant installe ! <br>Url de votre site : <a class="lien_cms" href="'.get_url_frontend().'">'.get_url_frontend().'</a><br>';
        echo 'Voici le lien vers ta page d\'administration : <a href="'.get_url_backend().'">'.get_url_backend().'</a><br>';
        echo 'Pensez a les enregistrer dans vos favoris !!';
    } else {
        unset($_SESSION);
        session_destroy();
        echo 'Une erreur c\'est produite pendant l\'installation. <br>Cliquez ici pour faire une nouvelle tentative : <a href="index.php">Nouvelle installation</a>';
    }
}