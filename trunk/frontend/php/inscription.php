<?php
if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_verif']) && isset($_POST['email'])) {
    if($_POST['password'] == $_POST['password_verif']) {
        if(!add_UTILISATEUR($bdd, $_POST['pseudo'], $_POST['email'], md5($_POST['password']), 1, 1)) {
            header("Location: index.php?page=erreur&msg=Erreur lors de l'insertion dans la BDD.");
        } else {
            $_SESSION['connected']        = true;
            $_SESSION['user']['Pseudo']   = $_POST['pseudo'];
            $_SESSION['user']['password'] = $_POST['password'];
            $_SESSION['user']['Mail']     = $_POST['email'];
            $_SESSION['user']['IdPhoto']  = 1;
            $_SESSION['user']['IdTypeUser'] = 1;
            header("Location: index.php");
        }
    } else {
        header("Location: index.php?page=erreur&msg=Les mots de passe ne sont pas identiques !");
    }
}
?>