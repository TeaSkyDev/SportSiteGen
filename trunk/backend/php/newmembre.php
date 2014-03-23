<?php


$profil = new Profil($bdd);



if( isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['pass']) ) {
    $profil->insert($_POST['pseudo'], $_POST['mail'], $_POST['pass'],1,1);
}

include("php/membre.php");

?>