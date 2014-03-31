<?php

require("../../mysql_connect.php");
require("../../tpl/libs/Smarty.class.php");
require("../../html2pdf/html2pdf.class.php");

if(isset($_GET['action'])) {
    if($_GET['action'] == "match" && isset($_GET['id'])) {
	$req = $bdd->prepare("select * from MATCHS where Id = :id");
	$req->execute(array(":id" => $_GET['id']));

	if($req->rowCount() !=0) {
	    $data = $req->fetch();

	    $smarty = new Smarty();
	    $smarty->assign("match", $data);
	    $content = $smarty->fetch("../templates/fiche_match.html");
	    
	    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
	    $html2pdf->WriteHTML($content);
	    $html2pdf->Output('test_'.$data['DateMATCHS'].'.pdf');
	} else {
	    echo "Erreur, aucune donnees.";
	}
    } else {
	echo "Erreur";
    }
}

?>