<?php

if(isset($_POST['template'])) {
    $query = Update_TABLE_byName($bdd, "SITE", 0, "current_template", $_POST['template']);
    if($query) {
        $msg = urlencode('Template mis à jour !<br><a href="index.php?page=configuration">Retour configuration</a> - <a href="index.php">Retour accueil</a>');
        header("Location: index.php?page=info&msg=".$msg);
    } else {
        $msg = urlencode("Erreur lors de la modification du template.");
        header("Location: index.php?page=err&msg=".$msg);
    }
} else {
    include("html/config.html");
}

?>