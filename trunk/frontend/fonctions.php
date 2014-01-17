<?php

require("../mysql_connect.php");


function add_NEWS($bdd, $titre, $date, $contenu, $IdPhoto, $auteur){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into NEWS values(null,'".$titre."','".$date."','".$contenu."',".$IdPhoto.",'".$auteur."')");
  $bdd->commit();
  if($reponse) return true;
  else return false;
}

function add_NEWS_COM($bdd, $contenu, $date, $idNews, $idUtilisateur){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into NEWS values(null,'".$contenu."','".$date."',".$idNews.",".$idUtilisateur.")");
  $bdd->commit();
  if($reponse) return true;
  else return false;
}

function add_EVENEMENT($bdd, $titre, $date, $contenu, $location){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into NEWS values(null,'".$contenu."','".$date."','".$location."')");
  $bdd->commit();
  if($reponse) return true;
  else return false;
}

function add_EVENEMENT_COM($bdd, $contenu, $idEvenement, $idUtilisateur){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into NEWS values(null,'".$contenu."','".$idEvenement."','".$idUtilisateur."')");
  $bdd->commit();
  if($reponse) return true;
  else return false;
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
  $reponse = $bdd->query("insert into PHOTO values(null,'".$nom."','".$fichier."','".$commentaires."')");
  $bdd->commit();

  if($reponse) return true;
  else return false;
}

function add_TYPE_USER($bdd , $nom, $description){
  $bdd->beginTransaction();
  $bdd->query("insert into TYPE_USER values(null,'".$nom."','".$description."')");
  if($reponse) return true;
  else return false;
  $bdd->commit();
}

function add_UTILISATEUR($bdd, $Pseudo, $Mail, $Mdp, $IdPhoto, $IdTypeUser){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into UTILISATEUR values(null,'".$Pseudo."','".$Mail."','".$Mdp."',".$IdPhoto.",".$IdTypeUser.")");
  $bdd->commit();
  if($reponse) return true;
  else return false;
}

function add_CATEGORIE($bdd, $nom, $description){
  $bdd->beginTransaction();
$reponse = $bdd->query("insert into UTILISATEUR values(null,'".$nom."','".$description."')");
  $bdd->commit();
  if($reponse) return true;
  else return false;
}

function add_INSCRIT($bdd, $nom, $prenom, $taille, $poids, $position, $idphoto, $idcategorie){
  $bdd->beginTransaction();
  $bdd->query("insert into UTILISATEUR values(null,'".$nom."','".$prenom."',".$taille.",".$poids.",'".$position."',".$idphoto.",".$idcategorie.")");
  $bdd->commit();    
  if($reponse) return true;
  else return false;
  
}

function add_TEAM_ADV($bdd, $nom, $idCategorie, $Description){
  $bdd->beginTransaction();
  $bdd->query("insert into TEAM_ADV values(null,'".$nom."',".$idCategorie.",'".$Description.")");
  $bdd->commit();  
  if($reponse) return true;
  else return false;

}

function add_MATCHS($bdd, $idCategorie, $idTeamADV, $date, $heure, $lieu, $commanetaire){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into MATCHS values(null,".$idCategorie.",".$idTeamADV.",'".$date."','".$heure."','".$lieu."','".$commentaire."')");
  $bdd->commit();   
  if($reponse) return true;
  else return false;

}

function add_PHOTO_MATCHS($bdd, $idMatch, $idphoto){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into PHOTO_MATCHS values(".$idMatch.",".$idphoto.")");
  $bdd->commit();   
  if($reponse) return true;
  else return false;
}

function add_APPARTENIR_EQUIPE($bdd, $equipe, $inscrit, $idMatch){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into APPARTENIR_EQUIPE values(null,".$equipe.",".$inscrit.","$idMatchs.")");
  $bdd->commit();     
  if($reponse) return false;
  else return false;
}


function add_POSTE($bdd, $nom, $description){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into POSTE values(null,'".$nom."','".$description."')");
  $bdd->commit();     
  if($reponse) return true;
  else return false;
}


function add_TYPE_PARTICIPATION($bdd, $idappart, $heureDeb, $idposte, $heureFin){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into TYPE_PARTICIPATIOn values(null,'".$idappart."','".$heureDeb."','".$idposte."','".$heureFin."')");
  $bdd->commit();     
  if($reponse) return true;
  else return false;
}

function add_POINTS($bdd, $nom, $nbpoint, $description){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into TYPE_PARTICIPATIOn values(null,'".$nom."','".$nbpoint."','".$description."')");
  $bdd->commit();     
  if($reponse) return true;
  else return false;
}

function add_JOUEUR_ADV($bdd, $idTeamadv, $nom, $prenom, $idposte){
  $bdd->beginTransaction();
 $reponse = $bdd->query("insert into JOUEUR_ADV values(null,".$idTeamADV.",'".$nom."','".$prenom."',".$poste.")");
  $bdd->commit();     
  if($reponse) return true;
  else return false;
}


function add_EVENT($bdd, $idmatch, $idinscrit, $idpoints, $nom,$moment, $commentaires){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into EVENT values(null,".$idMatch.",".$idinscrit.",".$idPoints.",'".$nom."','".$moment."','".$commentaires."')");
  $bdd->commit();     
  if($reponse) return true; 
  else return false;
}

function add_EVENT_ADV($bdd, $idmatch, $idjoueuradv, $idpoints, $nom, $moment, $commentaires){
  $bdd->beginTransaction();
 $reponse = $bdd->query("insert into EVENT_ADV values(null,".$idMatch.",".$idjoueuradv.",".$idPoints.",'".$nom."','".$moment."','".$commentaires."')");
  $bdd->commit();     
  if($reponse) return true; 
  else return false;
}


function add_TOURNOI($bdd, $nom, $description, $datedeb, $datefin){
  $bdd->beginTransaction();
  $reponse = $bdd->query("insert into TOURNOI values(null,'".$nom."','".$description."','".$datedeb."','".$datefin."')");
  $bdd->commit();     
  if($reponse) return true;
  else return false;
}

function add_APPARTENIR_TOURNOI($bdd, $idTournoi, $idMatch){
  $bdd->beginTransaction();
 $reponse = $bdd->query("insert into APPARTENIR_TOURNOI values(null,".$idTournoi.",".$idMatch.")");
  $bdd->commit();     
  if($reponse) return true;
  else return false;
}


function add_SITE($bdd, $nom, $URL){
  $bdd->beginTransaction();
 $reponse = $bdd->query("insert into SITE values(null,'".$nom."','".$url."')");
  $bdd->commit();       
  if($reponse) return true;
  else return false;
}


function get_nb_photos($bdd) {
  $nb = $bdd->query("select count(*) from PHOTO");
  if($nb) {
    $res = $nb->fetch();
    return $res[0];
  } else {
    return -1;
  }
}

function get_nb_type_user($bdd) {
  $nb = $bdd->query("select count(*) from TYPE_USER");
  if($nb) {
    $res = $nb->fetch();
    return $res[0];
  } else {
    return -1;
  }
}

function get_PHOTO_byId($bdd, $id){
  $reponse = $bdd->query("select * from PHOTO where Id = ".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}


function get_TYPE_USER_byId($bdd, $id){
  $reponse = $bdd->query("select * from TYPE_USER where Id = ".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_UTILISATEUR_byId($bdd, $id){
  $reponse = $bdd->query("select * from UTILISATEUR where Id = ".$id );
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}


function get_CATEGORIE_byId($bdd, $id){
  $reponse = $bdd->query("select * from CATEGORIE where Id = ".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_INSCRIT_byId($bdd, $id){
  $reponse = $bdd->query("select * from INSCRIT where Id = ".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}


function get_TEAM_ADV_byId($bdd, $id){
  $reponse = $bdd->query("select * from TEAM_ADV where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_MATCHS_byId($bdd, $id){
  $reponse = $bdd->query("select * from MATCHS where Id =".$id);
  return $data = $reponse->fetch();
}

function get_PHOTO_MATCHS_byId($bdd, $id){
  $reponse = $bdd->query("select * from PHOTO_MATCHS where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_APPARTENIR_EQUIPE_byId($bdd, $id){
  $reponse = $bdd->query("select * from APPARTENIR_EQUIPE where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_POSTE_byId($bdd, $id){
  $reponse = $bdd->query("select * from POSTE where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_TYPE_PARTICIPATION_byId($bdd, $id){
  $reponse = $bdd->query("select * from TYPE_PARTICIPATION where Id=".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_POINTS_byId($bdd, $id){
  $reponse = $bdd->query("select * from POINTS where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_JOUEUR_ADV_byId($bdd, $id){
  $reponse = $bdd->query("select * from JOUEUR_ADV where Id=".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_EVENT_byId($bdd, $id){
  $reponse = $bdd->query("select * from EVENT where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_EVENT_ADV_byId($bdd, $id){
  $reponse = $bdd->query("select * from EVENT_ADV wher Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_TOURNOI_byId($bdd, $id){
  $reponse = $bdd->query("select * from TOURNOI where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_APPARTENIR_TOURNOI_byId($bdd, $id){
  $reponse = $bdd->query("select * from APPARTENIR_TOURNOI where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_NEWS_byId($bdd, $id){
  $reponse = $bdd->query("select * from NEWS where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_NEWS_COM_byId($bdd, $id){
  $reponse = $bdd->query("select * from NEWS_COM where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_EVENEMENT_byId($bdd, $id){
  $reponse = $bdd->query("select * from EVENEMENT where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}

function get_EVENEMENT_COM_byId($bdd, $id){
  $reponse = $bdd->query("select * from EVENEMENT_COM where Id =".$id);
  if($reponse)
    return $data = $reponse->fetch();
  else return false;
}


function Update_TABLE_byCol($bdd, $TblName, $id, $i, $value){
  $select = $bdd->query("select * from ".$TblName);
  $meta = $select->getColumnMeta($i);
  $name = $meta['name'];
  $reponse;
  if($meta['native_type'] == "integer"){
    $reponse = $bdd->query("UPDATE ".$TblName." SET ".$name."=".$value." where Id=".$id);
  }
  else{
    $reponse = $bdd->query("UPDATE ".$TblName." SET ".$name."='".$value."' where Id=".$id);
  }
  if($reponse) return true;
  else return false;
}

function Update_TABLE_byName($bdd, $TblName, $id, $name, $value){
  $select;
  if(gettype($value) == "integer")
    $select = $bdd->query("UPDATE ".$TblName." SET ".$name." = ".$value);
  else 
    $select = $bdd->query("UPDATE ".$TblName." SET ".$name." = '".$value."'");
  if($select) return true;
  else return false;
}

?>