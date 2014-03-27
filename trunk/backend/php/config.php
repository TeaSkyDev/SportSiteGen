<?php

if(isset($_POST['template'])) {
    $query = Update_TABLE_byName($bdd, "SITE", 0, "current_template", $_POST['template']);
    if($query) {
        $msg = urlencode('Template mis a jour !');
        header("Location: index.php?page=info&page_r=configuration&msg=".$msg);
    } else {
        $msg = urlencode("Erreur lors de la modification du template.");
        header("Location: index.php?page=err&page_r=configuration&msg=".$msg);
    }
} else {
    include("html/config.html");
}

?>