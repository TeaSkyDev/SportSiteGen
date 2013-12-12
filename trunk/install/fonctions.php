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

function start_step_one() {
?>
    <section id="page">
		<h2>Installation de la base de données</h2>
		<form method="POST" action="index.php" onSubmit="return verif_form_1(this)">
			<section>
				<label>Serveur</label><input type="text" name="server"/>
			</section>
			<section>
				<label>Login</label><input type="text" name="login"/>
			</section>
			<section>
				<label>Mot de passe</label><input type="password" name="pass"/>
			</section>
			<section>
				<label>Base de données</label><input type="text" name="bdd"/>
			</section>
			<section id="boutons">
				<input type="button" value="Retour">
				<input type="submit" value="Valider">
			</section>
            <input type="hidden" name="step" value="step_1"/>
		</form>
	</section>
<?php
    /*echo '<h1 align="center">Etape 1</h1>';
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
    echo '<th>Base de donnees :</th><td><input type="text" name="bdd"/></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th colspan="2"><input type="submit" value="Ok"/>';
    echo '</tr>';
    echo '</table>';
    echo '<input type="hidden" name="step" value="step_1"/>';
    echo '</form>';*/
}

function start_step_two() {
    //echo '<h1 align="center">Base de donnees cree !!</h1>';

    /* var_dump permet d'afficher le contenu de varaibles et tableau, pratique pour savoir si toutes les info d'un form sont passées */
    echo '# DEBUG :<br>';
    //var_dump($_POST);

    ?>
    <section id="page">
        <h2>Création du compte administrateur</h2>
        <form method="POST" action="index.php" onSubmit="return verif_form_2(this)">
            <section>
                <label>Login</label><input type="text" name="login"/>
            </section>
            <section>
                <label>Mot de passe</label><input type="password" name="pass"/>
            </section>
            <section>
                <label>Mot de passe (verif)</label><input type="password" name="pass_verif"/>
            </section>
            <section>
                <label>Mail</label><input type="text" name="mail"/>
            </section>
            <section id="boutons">
                <input type="button" value="Retour">
                <input type="submit" value="Valider">
            </section>
            <input type="hidden" name="step" value="step_2"/>
        </form>
    </section>
<?php /*

    echo '<h1 align="center">Creation du compte administrateur</h1>';

    echo '<form method="POST" action="index.php" onsubmit="return verif_form_2(this)">';
    echo '<table align="center">';
        echo '<tr>';
            echo '<th>Login : </th><td><input type="text" name="login"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Mot de passe : </th><td><input type="password" name="pass"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Mot de passe (verification) : </th><td><input type="password" name="pass_verif"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th>Mail : </th><td><input type="text" name="mail"/></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<th colspan="2"><input type="submit" value="Ok"/></th>';
        echo '</tr>';
    echo '</table>';
        echo '<input type="hidden" name="step" value="step_2"/>';
    echo '</form>';*/


}

function start_step_three() {
   // echo '<h1 align="center">Compte administrateur cree !</h1>';

    //var_dump($_POST);

    ?>
    <section id="page">
        <h2>Choisissez le nom de votre site</h2>
        <form method="POST" action="index.php">
            <section>
                <input type="text" name="nom_site" required/>
            </section>
            <section id="boutons">
                <input type="button" value="Retour">
                <input type="submit" value="Valider">
            </section>
            <input type="hidden" name="step" value="step_3"/>
        </form>
    </section>
    <?php /*

    echo '<form method="POST" action="index.php">';
    echo '<p>Choisissez maintenant le nom de votre site :</p> <input type="text" name="nom_site" required/>';
    echo '<input type="hidden" name="step" value="step_3"/>';
    echo '<input type="submit" value="Terminer l\installation"/>';
    echo '</form>';*/
}

function show_recapitulatif() {
    echo '<h2>Soon...</h2>';
}