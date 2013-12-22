<?php


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