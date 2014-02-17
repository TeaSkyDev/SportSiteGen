<?php

echo var_dump($_GET);
echo var_dump($_POST);

if(isset($_POST['id_supp']) && isset($_GET['page'])) {
        if(Delete_byID($bdd, "NEWS", $_POST['id_supp'])) {
            header("Location: index.php?page=article");
        } else {
            $msg = "Erreur lors de la suppression.";
            header("Location: index.php?page=err&msg=".$msg);
        }
} else {
    echo "test";
}

?>