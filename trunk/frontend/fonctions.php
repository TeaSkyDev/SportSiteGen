<?php

require("../mysql_connect.php");


function add_NEWS($bdd, $titre, $date, $contenu){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into NEWS values(null,'".$titre."','".$date."','".$contenu."')");
  $bdd->commit();
}

function see_news($bdd){
  $rep = $bdd->query("select * from NEWS");
  while ($data = $rep->fetch()){
    echo $data['id']." ".$data['titre']." ".$data['date']." ".$data['contenu'];
    echo "\n";
  }
}

function add_PHOTO($bdd, $nom, $fichier,$commentaires){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into PHOTO values(null,'".$nom."','".$fichier."','".$commentaires."')");
  $bdd->commit();
}

function add_TYPE_USER($bdd , $nom, $description){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into TYPE_USER values(null,'".$nom."','".$description."')");
  $bdd->commit();
}

function add_UTILISATEUR($bdd, $Pseudo, $Mail, $Mdp, $IdPhoto, $idTypeUser){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into UTILISATEUR values(null,'".$Pseudo."','".$Mail."','".$Mdp."',".$IdPhoto.",".$IdTypeUser.")");
  $bdd->commit();
}

function add_CATEGORIE($bdd, $nom, $description){
 
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into UTILISATEUR values(null,'".$nom."','".$description."')");
  $bdd->commit();
}

function add_INSCRIT($bdd, $nom, $prenom, $taille, $poids, $position, $idphoto, $idcategorie){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into UTILISATEUR values(null,'".$nom."','".$prenom."',".$taille.",".$poids.",'".$position."',".$idphoto.",".$idcategorie.")");
  $bdd->commit();  
}

function add_TEAM_ADV($bdd, $nom, $idCategorie, $Description){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into TEAM_ADV values(null,'".$nom."',".$idCategorie.",'".$Description.")");
  $bdd->commit();  
}

function add_MATCHS($bdd, $idCategorie, $idTeamADV, $date, $heure, $lieu, $commanetaire){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into MATCHS values(null,".$idCategorie.",".$idTeamADV.",'".$date."','".$heure."','".$lieu."','".$commentaire."')");
  $bdd->commit();   
}

function add_PHOTO_MATCHS($bdd, $idMatch, $idphoto){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into PHOTO_MATCHS values(".$idMatch.",".$idphoto.")");
  $bdd->commit();   
}

function add_APPARTENIR_EQUIPE($bdd, $inscrit, $idMatch){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into APPARTENIR_EQUIPE values(null,".$idCategorie.",".$idTeamADV.",'".$date."','".$heure."','".$lieu."','".$commentaire."')");
  $bdd->commit();     
}


function add_POSTE($bdd, $nom, $description){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into POSTE values(null,'".$nom."','".$description."')");
  $bdd->commit();     
}


function add_TYPE_PARTICIPATION($bdd, $idappart, $heureDeb, $idposte, $heureFin){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into TYPE_PARTICIPATIOn values(null,'".$idappart."','".$heureDeb."','".$idposte."','".$heureFin."')");
  $bdd->commit();     
}

function add_POINTS($bdd, $nom, $nbpoint, $description){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into TYPE_PARTICIPATIOn values(null,'".$nom."','".$nbpoint."','".$description."')");
  $bdd->commit();     
}

function add_JOUEUR_ADV($bdd, $idTeamadv, $nom, $prenom, $idposte){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into JOUEUR_ADV values(null,".$idTeamADV.",'".$nom."','".$prenom."',".$poste.")");
  $bdd->commit();     
}


function add_EVENT($bdd, $idmatch, $idinscrit, $idpoints, $nom,$moment, $commentaires){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into EVENT values(null,".$idMatch.",".$idinscrit.",".$idPoints.",'".$nom."','".$moment."','".$commentaires."')");
  $bdd->commit();     
}

function add_EVENT_ADV($bdd, $idmatch, $idjoueuradv, $idpoints, $nom, $moment, $commentaires){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into EVENT_ADV values(null,".$idMatch.",".$idjoueuradv.",".$idPoints.",'".$nom."','".$moment."','".$commentaires."')");
  $bdd->commit();     
}


function add_TOURNOI($bdd, $nom, $description, $datedeb, $datefin){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into TOURNOI values(null,'".$nom."','".$description."','".$datedeb."','".$datefin."')");
  $bdd->commit();     
}

function add_APPARTENIR_TOURNOI($bdd, $idTournoi, $idMatch){
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into APPARTENIR_TOURNOI values(null,".$idTournoi.",".$idMatch.")");
  $bdd->commit();     
}


function add_SITE($bdd, ){
}

?>