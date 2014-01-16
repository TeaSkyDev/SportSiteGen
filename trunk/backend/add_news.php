<?php

require("../mysql_connect.php");


function add_new($bdd, $titre, $date, $contenu){
  $rep = $bdd->query("select max(id) from NEWS");
  while($data = $rep->fetch()){
    $i['id'] = $data['max(id)'];
    echo $i['id'];
  }
  $i['id']++;
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into NEWS values(".$i['id'].",'".$titre."','".$date."','".$contenu."')");
  $bdd->commit();
}

function see_news($bdd){
  $rep = $bdd->query("select * from NEWS");
  while ($data = $rep->fetch()){
    echo $data['id']." ".$data['titre']." ".$data['date']." ".$data['contenu'];
    echo "\n";
  }
}

function add_photo($bdd, $id, $nom, $fichier){
  $rep = $bdd->query("select max(Id) from PHOTO");
  while($data = $rep->fetch()){
    $i['id'] = $data['max(Id)'];
    echo $i['id'];
  }
  $i['id']++;
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into PHOTO values(".$i['id'].",'".$nom."','".$fichier."','".$commentaires."')");
  $bdd->commit();
}

function add_Type_User($bdd , $nom, $description){
  $rep = $bdd->query("select max(Id) from TYPE_USER");
  while($data = $rep->fetch()){
    $i['id'] = $data['max(Id)'];
    echo $i['id'];
  }
  $i['id']++;
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into TYPE_USER values(".$i['id'].",'".$nom."','".$description."')");
  $bdd->commit();
}

function add_UTILISATEUR($bdd, $Pseudo, $Mail, $Mdp, $IdPhoto, $idTypeUser){
  $rep = $bdd->query("select max(Id) from UTILISATEUR");
  while($data = $rep->fetch()){
    $i['id'] = $data['max(Id)'];
    echo $i['id'];
  }
  $i['id']++;
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into UTILISATEUR values(".$i['id'].",'".$Pseudo."','".$Mail."','".$Mdp."',".$IdPhoto.",".$IdTypeUser.")");
  $bdd->commit();
}

function add_CATEGORIE($bdd, $nom, $description){
   $rep = $bdd->query("select max(Id) from CATEGORIE");
  while($data = $rep->fetch()){
    $i['id'] = $data['max(Id)'];
    echo $i['id'];
  }
  $i['id']++;
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into UTILISATEUR values(".$i['id'].",'".$nom."','".$description."')");
  $bdd->commit();
}

function add_INSCRIT($bdd, $nom, $prenom, $taille, $poids, $position, $idphoto, $idcategorie){
   $rep = $bdd->query("select max(Id) from INSCRIT");
  while($data = $rep->fetch()){
    $i['id'] = $data['max(Id)'];
    echo $i['id'];
  }
  $i['id']++;
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into UTILISATEUR values(".$i['id'].",'".$nom."','".$prenom."',".$taille.",".$poids.",'".$position."',".$idphoto.",".$idcategorie.")");
  $bdd->commit();  
}

function add_TEAM_ADV($bdd, $nom, $idCategorie, $Description){
     $rep = $bdd->query("select max(Id) from TEAM_ADV");
  while($data = $rep->fetch()){
    $i['id'] = $data['max(Id)'];
    echo $i['id'];
  }
  $i['id']++;
  $bdd->beginTransaction();
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->query("insert into TEAM_ADV values(".$i['id'].",'".$nom."',".$idCategorie.",'".$Description.")");
  $bdd->commit();  
}

?>