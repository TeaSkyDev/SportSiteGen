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

	    /* récupération info équipes  */
	    $data_equipe_1 = $bdd->query("select * from TEAM where Id = ".$data['IdTeam1'])->fetch();
	    $data_equipe_2 = $bdd->query("select * from TEAM where Id = ".$data['IdTeam2'])->fetch();
	    /* recup categorie (on prend celle de l'une des equipe...) */
	    $data['categorie'] = $bdd->query("select Nom from CATEGORIE where Id = ".$data_equipe_1['IdCategorie'])->fetch()['Nom'];
	    /* recup joueurs équipe 1 */
	    $sql_joueur = $bdd->query("select * from JOUEUR where IdTeam = ".$data_equipe_1['Id']);
	    $i = 0;
	    $data_joueurs_eq1 = array();
	    while($d = $sql_joueur->fetch()) {
		$data_joueurs_eq1[$i] = $d;
		$data_joueurs_eq1[$i]['poste'] = $bdd->query("select * from POSTE where Id = ".$d['IdPoste'])->fetch()['Id'];
		$i++;
	    }
		
	    /* recup joueurs équipe 1 */
	    $sql_joueur = $bdd->query("select * from JOUEUR where IdTeam = ".$data_equipe_2['Id']);
	    $i = 0;
	    $data_joueurs_eq2 = array();
	    while($d = $sql_joueur->fetch()) {
		$data_joueurs_eq2[$i] = $d;
		$data_joueurs_eq2[$i]['poste'] = $bdd->query("select * from POSTE where Id = ".$d['IdPoste'])->fetch()['Id'];
		$i++;
	    }

	    $smarty = new Smarty();
	    $smarty->assign("match", $data);
	    $smarty->assign("equipe1", $data_equipe_1);
	    $smarty->assign("equipe2", $data_equipe_2);
	    $smarty->assign("Joueur_equipe1", $data_joueurs_eq1);
	    $smarty->assign("Joueur_equipe2", $data_joueurs_eq2);
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