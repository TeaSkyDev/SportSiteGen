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
		$data_joueurs_eq2[$i]['poste'] = $bdd->query("select Nom from POSTE where Id = ".$d['IdPoste'])->fetch()['Nom'];
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
    } else if($_GET['action'] == "tournoi" && isset($_GET['id'])) {
	$req = $bdd->prepare("select * from TOURNOI where Id = :id");
	$req->execute(array(":id" => $_GET['id']));

	if($req->rowCount() !=0) {
	    $data = $req->fetch();

	    /* récupération des matchs */ 
	    $matchs = array();
	    $query_matchs = $bdd->query("select * from MATCHS where Id in (select IdMATCHS from APPARTENIR_TOURNOI where IdTournoi = ".$data['Id'].")");
	    $i = 0;
	    while($tmp = $query_matchs->fetch()) {
		$matchs[$i] = $tmp;
		$matchs[$i]['equipe1'] = $bdd->query("select Nom from TEAM where Id = ".$tmp['IdTeam1'])->fetch()['Nom'];
		$matchs[$i]['equipe2'] = $bdd->query("select Nom from TEAM where Id = ".$tmp['IdTeam2'])->fetch()['Nom'];
		$i++;
	    }
	    
	    /* récupération des équipes + joueurs */
	    $equipes          = array();
	    $liste_nom_equipes = array();
	    $liste_id_equipes = array();
	    for($i = 0; $i < count($matchs); $i++) {
		if(!in_array($matchs[$i]['IdTeam1'], $liste_id_equipes)) {
		    array_push($liste_id_equipes, $matchs[$i]['IdTeam1']);
		}
		if(!in_array($matchs[$i]['IdTeam2'], $liste_id_equipes)) {
		    array_push($liste_id_equipes, $matchs[$i]['IdTeam2']);
		}
	    }
	    
	    $j = 0;
	    for($i = 0; $i < count($liste_id_equipes); $i++) {
		$liste_nom_equipes[$i] = $bdd->query("select * from TEAM where Id = ".$liste_id_equipes[$i])->fetch();
		$req_membres = $bdd->query("select * from JOUEUR where IdTeam = ".$liste_id_equipes[$i]);
		while($tmp = $req_membres->fetch()) {
		    $equipes[$j] = $tmp;
		    $equipes[$j]['Poste'] = $bdd->query("select Nom from POSTE where Id = ".$tmp['IdPoste'])->fetch()['Nom'];
		    $j++;
		}
		
	    }
	    	    
	    /* création du classement */
	    $classement = array();
	    /*
             pour chaque equipe
	          pour chaque match
		       si idEq == match.idTeam1
		          si score1 > score2
			      classement[i][gagne]++
			  sinon si score1 == score2
			      classement[i][nulle]++
			  sinon 
			      classement[i][perdu]++
                          fin si
		       sinon si idEq == match.idTeam2
		          si score1 > score2
			      classement[i][gagne]++
			  sinon si score1 == score2
			      classement[i][nulle]++
			  sinon 
			      classement[i][perdu]++
                          fin si
		       fin si
		   fin pour
              fin pour      
	     */
	    /* initialisation tableau classement */
	    for($i = 0; $i < count($liste_nom_equipes); $i++) {
		$classement[$i]['equipe'] = $liste_nom_equipes[$i]['Nom'];
		$classement[$i]['gagne']  = 0;
		$classement[$i]['perdu']  = 0;
		$classement[$i]['null']   = 0;
		$classement[$i]['tot']    = 0;
	    }
	    /* calcul des parties gagnées, pardues, nulles */
	    for($i = 0; $i < count($liste_nom_equipes); $i++) {
		for($j = 0; $j < count($matchs); $j++) {
		    if($liste_nom_equipes[$i]['Id'] == $matchs[$j]['IdTeam1']) {
			if($matchs[$j]['nbPoint1'] > $matchs[$j]['nbPoint2']) {
			    $classement[$i]['gagne']++;
			} else if($matchs[$j]['nbPoint1'] == $matchs[$j]['nbPoint2']) {
			    $classement[$i]['null']++;
			} else {
			    $classement[$i]['perdu']++;
			}
		    } else if($liste_nom_equipes[$i]['Id'] == $matchs[$j]['IdTeam2']) {
			if($matchs[$j]['nbPoint1'] < $matchs[$j]['nbPoint2']) {
			    $classement[$i]['gagne']++;
			} else if($matchs[$j]['nbPoint1'] == $matchs[$j]['nbPoint2']) {
			    $classement[$i]['null']++;
			} else {
			    $classement[$i]['perdu']++;
			}
		    }
		}
	    }

	    /* Calcul des points (gagne = 3pts, nulle = 2pts, perdue = 1pts), diff */
	    for($i = 0; $i < count($classement); $i++) {
		$classement[$i]['tot'] = ($classement[$i]['gagne']*3) + ($classement[$i]['null']*2) + $classement[$i]['perdu'];
	    }
	    /* on tri */
	    $trie = false;
	    while(!$trie) {
		$trie = true;
		for($i = 0; $i < count($classement); $i++) {
		    if($i < count($classement)-1) {
			if($classement[$i]['tot'] < $classement[$i+1]['tot']) {
			    $tmp = $classement[$i];
			    $classement[$i] = $classement[$i+1];
			    $classement[$i+1] = $tmp;
			    $trie = false;
			} else if($classement[$i]['tot'] == $classement[$i+1]['tot']) {
			    if($classement[$i]['gagne'] < $classement[$i+1]['gagne']) {
				$tmp = $classement[$i];
				$classement[$i] = $classement[$i+1];
				$classement[$i+1] = $tmp;
				$trie = false;
			    }
			}
		    }
		}
	    }

	    $smarty = new Smarty();
	    $smarty->assign("tournoi", $data);
	    $smarty->assign("Matchs", $matchs);
	    $smarty->assign("Classement", $classement);
	    $smarty->assign("ListeNomsEquipe", $liste_nom_equipes);
	    $smarty->assign("ListeEquipe", $equipes);
	    

	    $content = $smarty->fetch("../templates/fiche_tournoi.html");

	    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
	    $html2pdf->WriteHTML($content);
	    $html2pdf->Output('test_'.$data['DateDebut'].'.pdf');
	} else {
	    echo "aucune donnes";
	}
    } else {
	echo "Erreur";
    }
}

?>