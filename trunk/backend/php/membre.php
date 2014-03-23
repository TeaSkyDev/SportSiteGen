<?php

if(isset($_GET['id'])) {
    if(Profil::s_delete_byId($bdd, $_GET['id'])) {
        include("html/membre.html");
    } else {
        include("php/err.php");
    }
} else {
    include("php/err.php");
}

?>