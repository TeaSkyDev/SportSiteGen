<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 18/01/14
 * Time: 12:00
 */

if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
    $profil = $_SESSION['user'];
    $profil['img'] = get_PHOTO_byId($bdd, $profil['IdPhoto'])['Fichier'];
    $profil['statu'] = get_TYPE_USER_byId($bdd, $profil['IdTypeUser'])['Nom'];
    if($profil) {
        $smarty->assign("Profil", $profil);
        $smarty->display("html/profil.html");
    } else {
        header("Location: index.php?page=erreur&msg=Erreur recuperation du profil");
    }
}