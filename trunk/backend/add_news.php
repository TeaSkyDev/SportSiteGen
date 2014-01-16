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



?>