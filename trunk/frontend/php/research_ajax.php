<?php
require("../../mysql_connect.php");
if(isset($_GET['val'])) {
    $data = "";
    $val = $_GET['val'].'%';
    $sql = $bdd->prepare("select titre from NEWS where titre like :val order by Id desc");
    $sql->execute(array(":val" => $val));
    if($sql->rowCount() != 0) {
	while($d = $sql->fetch()) {
	    $data .= $d['titre'].'|';
	}
	echo $data;
    } else {
	echo "test";
    }
} else {
    echo "erreur";
}
?>